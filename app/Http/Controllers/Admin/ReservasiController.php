<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Http\Requests\StoreReservasiRequest;
use App\Http\Requests\UpdateReservasiRequest;
use App\Models\Buku;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class reservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku= Buku::all();
        $user = User::all();
        $reservasi = Reservasi::all();
        return view('Admin.reservasi.base', compact('buku', 'user', 'reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        $user = User::all();
        return view('Admin.reservasi.createReservasi', compact('buku', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Reservasi::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
        ]);
        return redirect()->route('reservasi.index')->with('create', "berhasi Menambahkan
         Data Reservasi");
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservasi $reservasi)
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
        $reservasi = Reservasi::findOrFail($id);

        return view("Admin.reservasi.updateReservasi", compact("buku","user","reservasi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservasi $reservasi)
    {
        $reservasi->update([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
        ]);
        $reservasi->update();
        return redirect()->route('reservasi.index')->with('update', "berhasil Update 
        Data Reservasi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi = Reservasi::findOrFail($reservasi->id);
        $reservasi->delete();

        return redirect()->back()->with('delete', "berhasil hapus data reservasi");
    }
}
