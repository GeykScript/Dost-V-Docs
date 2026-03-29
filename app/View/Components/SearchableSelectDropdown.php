<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchableSelectDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    public $name;
    public $placeholder;

    public function __construct($items, $name, $placeholder = null)
    {
        $this->items = $items;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.searchable-select-dropdown');
    }
}
