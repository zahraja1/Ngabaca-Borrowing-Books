<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use App\Http\Requests\StorePengembalianRequest;
use App\Http\Requests\UpdatePengembalianRequest;
use App\Models\Buku;
use App\Models\Customer;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $peminjaman = Peminjaman::all();
        $pengembalian = Pengembalian::all();
        return view ('Admin.pengembalian.base', compact('pengembalian', 'user', 'peminjaman'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();   
        $peminjaman = Peminjaman::all();
        $buku = Buku::all();
        return view("Admin.pengembalian.createPengembalian", compact('user', 'peminjaman', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pengembalian::create([
            'user_id'=>$request->user_id,
            'buku_id'=>$request->buku_id,
            'peminjaman_id'=>$request->peminjaman_id,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
        ]);

        return redirect()->route('pengembalian.index')->with('Create', "Berhasil Menambahkan Data Pengembalian Buku");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::all();  
        $peminjaman = Peminjaman::all();
        $pengembalian = Pengembalian::findOrFail($id);

        return view('Admin.pengembalian.updatePengembalian', compact('peminjaman', 'user', 'pengembalian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengembalian= Pengembalian::findOrFail($id);
        $pengembalian->update([
            'user_id'=>$request->user_id,
            'peminjaman_id'=>$request->peminjaman_id,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
        ]);
        $pengembalian->update();
        return redirect()->route('pengembalian.index')->with('Update', "Data Pengembalian Berhasil Di Update !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->back()->with("delete", "berhasil hapus data");
    }
}
