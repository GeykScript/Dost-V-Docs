<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddAccountController extends Controller
{
    public function index(){
        return view('account.add-account');
    }
}
