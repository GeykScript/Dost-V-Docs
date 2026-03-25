<?php 

namespace App\Livewire\Modal\Unit;

use Livewire\Component;
use App\Models\UserAssignment;
use App\Models\Unit;

class AssignUnit extends Component
{
    public $userId;
    public $showModal = false;

    public $unitSearch = '';
    public $unitId = null;
    public $position = '';

    // Strictly Head and Staff
    public $availablePositions = ['Unit Head', 'Staff'];

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function selectUnit($id, $name)
    {
        $this->unitId = $id;
        $this->unitSearch = $name;
        $this->resetValidation('unitId');
    }

    public function selectPosition($position)
    {
        $this->position = $position;
        $this->resetValidation('position');
    }

    public function save()
    {
        $this->validate([
            'unitId' => 'required|exists:units,id',
            'position' => 'required|in:Unit Head,Staff',
        ], [
            'unitId.required' => 'Please select a unit.',
            'position.required' => 'Please select a position.'
        ]);

        UserAssignment::create([
            'user_id' => $this->userId,
            'unit_id' => $this->unitId,
            'position' => $this->position,
            'is_current' => 1, // Defaulting new assignments to active
        ]);

        $this->dispatch('assignmentSaved', message: 'User successfully assigned to unit.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['unitSearch', 'unitId', 'position']);
        $this->showModal = false;
    }

    public function render()
    {
        // 1. Get IDs of units where the user is CURRENTLY assigned
        $activeUnitIds = UserAssignment::where('user_id', $this->userId)
            ->where('is_current', 1)
            ->pluck('unit_id');

        // 2. Query units, explicitly EXCLUDING the active ones
        $query = Unit::whereNotIn('id', $activeUnitIds);

        // 3. If searching, filter by name/abbreviation
        if (strlen($this->unitSearch) > 0 && !$this->unitId) {
            $query->where(function($q) {
                $q->where('unit_name', 'like', '%' . $this->unitSearch . '%')
                  ->orWhere('abbreviation', 'like', '%' . $this->unitSearch . '%');
            });
        }

        // 4. If user modifies input after selecting, clear the selected ID
        if ($this->unitId && strlen($this->unitSearch) > 0) {
            $selectedUnit = Unit::find($this->unitId);
            if ($selectedUnit && $selectedUnit->unit_name !== $this->unitSearch) {
                $this->unitId = null;
            }
        }

        // Limit to 50 so the dropdown doesn't crash the browser if there are hundreds
        $searchResults = $query->take(50)->get();

        return view('livewire.modal.unit.assign-unit-modal', [
            'searchResults' => $searchResults
        ]);
    }
}