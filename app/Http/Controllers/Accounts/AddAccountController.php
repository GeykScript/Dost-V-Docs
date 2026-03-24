<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

use App\Http\Requests\UserAccount\UserAccountRequest;

class AddAccountController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('account.add-account', compact('units'));
    }

    public function store(UserAccountRequest  $request){
         $validatedData = $request->validated();

        dd($validatedData);

        return redirect()->route('accounts')->with('success', 'Account created successfully!');
    }
}
