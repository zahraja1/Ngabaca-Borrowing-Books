<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class BaseController extends Controller
{
    public function index(){
        $user = User::count();
        return view('template.index', compact('user'));
    }

    public function chart(){
        return view('Chard');
    }
}
