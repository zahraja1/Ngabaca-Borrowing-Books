<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Gendre;
use App\Models\Jenis;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Ui\Presets\React;

class FrontController extends Controller
{
    public function Test(){
        $buku = Buku::all();
        return Inertia('Test', [
            'buku' => $buku,
        ]);
    }

    public function Buku(){
        $buku = Buku::all();
        $gendre = Gendre::with('gendre')->get();
        return Inertia('Buku', [
            'buku'=>$buku,
            'gendre'=>$gendre
        ]);
    }

    public function Review(){
        $ulasan = Ulasan::all();
        return Inertia('Review', [
            'ulasan'=>$ulasan,
        ]);
    }

    public function Peminjaman(){
        $peminjaman = Peminjaman::all();
        return Inertia('Peminjaman', [
            'Peminjaman'=>$peminjaman,
        ]);
    }
    public function customer(){
        $buku = Buku::all();
        return Inertia('Customer',compact('Customer'));
    }
   
    
    public function search(Request $request)
    {
        $buku = Buku::query();
        if($request->has('search')){
            $buku->where('judul', 'like', '%'.$request->input('search'). '%');
        }
        return Inertia('Search', [
            'buku'=>$buku->paginate(10),
            'search' => $request->input('search'),
        ]);
    }
}
