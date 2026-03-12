<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountsController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        return view('Account.edit-account', compact('user'));
    }
}
