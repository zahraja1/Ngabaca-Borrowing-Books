<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function admin(){
       $buku = Buku::all();
       return Inertia('Admin.Admin', [
        'buku'=> $buku
       ]) ;
    }
}
