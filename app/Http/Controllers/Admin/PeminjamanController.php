<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Buku;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $customer = Customer::all();
        $peminjaman = Peminjaman::all();
        return view('Admin.peminjaman.base', compact('peminjaman', 'buku', 'customer'));
    }

//     /**
//      * Show the form for creating a new resource.
//      */
    public function create()
    {
      $user = User::all();
       $buku = Buku::all();
        $peminjaman = Peminjaman::all();

        return view('Admin.peminjaman.createPeminjaman', compact('peminjaman', 'buku', 'user'));
    }

//     /**
//      * Store a newly created resource in storage.
//      */
    public function store(Request $request)
{
    Peminjaman::create([
        'buku_id' => $request->buku_id,
        'user_id' => $request->user_id,
        'kode_peminjaman' => $request->kode_peminjaman,
        'tanggal_peminjaman' => $request->tanggal_peminjaman,
        'tanggal_pengembalian' => $request->tanggal_pengembalian, 
    ]);

    return redirect()->route('peminjaman.index')->with('success', 'Berhasil Memperbarui Data Peminjaman');
}


//     /**
//      * Display the specified resource.
//      */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

//     /**
//      * Show the form for editing the specified resource.
//      */
    public function edit($id)
    {
        $user = User::all();
        $buku = Buku::all();
        $peminjaman = Peminjaman::findOrFail($id);

        return view('Admin.peminjaman.updatePeminjaman', compact('buku','user','peminjaman'));
    }

//     /**
//      * Update the specified resource in storage.
//      */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'buku_id'=>$request->buku_id,
            'user_id'=>$request->user_id,
            'kode_peminjaman'=>$request->kode_peminjaman,
            'tanggal_peminjaman'=>$request->tanggal_peminjaman,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
        ]);
        $peminjaman->update();
        return redirect()->route('peminjaman.index')->with('Update', "Data Peminjaman Berhasil Di Update !");
    }

//     /**
//      * Remove the specified resource from storage.
//      */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman = Peminjaman::finOrFail($peminjaman->id);
        $peminjaman->delete();

        return redirect()->back()->with('delete', "berhasil Hapus Data Peminjaman");
    }
}
