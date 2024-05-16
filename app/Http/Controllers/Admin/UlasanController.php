<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use App\Http\Requests\StoreUlasanRequest;
use App\Http\Requests\UpdateUlasanRequest;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasan = Ulasan::all();

        return view("Admin.ulasan.base", compact("ulasan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $buku = Buku::all();
        $ulasan = Ulasan::all();
        return view ('Admin.ulasan.createUlasan', compact('user', 'buku', 'ulasan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ulasan::create([
            'buku_id'=>$request->buku_id,
            'user_id'=>$request->user_id,
            'komentar'=>$request->komentar,
            'rating'=>$request->rating
        ]);
        return redirect()->route('ulasan.index')->with('success', 'berhasil menambahkan data ulasan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::all();
        $user = User::all();
        $ulasan = Ulasan::findOrFail($id);

        return view('Admin.ulasan.updateUlasan', compact('buku', 'user', 'ulasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        $ulasan->update([
            'buku_id'=>$request->buku_id,
            'komentar'=>$request->komentar,
            'rating'=>$request->rating,
        ]);
        $ulasan->update();
        return redirect()->route('ulasan.index')->with('Update', "Data Data Peminjaman
         Berhasil Di Update !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        $ulasan = Ulasan::findOrFail($ulasan->id);
        $ulasan->delete();

        return redirect()->back()->with('delete', "berhasil Hapus Data Peminjaman");
    }
}
