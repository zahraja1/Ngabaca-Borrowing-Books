<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chartController extends Controller
{
    public function index(){
        $user = User::select(DB::raw("COUNT(*) as count"))
        ->groupBy(DB::raw("role"))
        ->pluck('count');

        return view('Admin.Chart.Chart', compact('user'));
    }
}
