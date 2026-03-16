<?php

namespace App\Http\Controllers\Accounts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class EditAccountController extends Controller
{
      public function index($id){
        $user = User::findOrFail($id);
        return view('account.edit-account', compact('user'));
    }
}
