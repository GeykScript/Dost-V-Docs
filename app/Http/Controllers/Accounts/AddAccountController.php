<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;


class AddAccountController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('account.add-account', compact('units'));
    }
}
