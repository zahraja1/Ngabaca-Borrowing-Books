<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index(){
        $buku= Buku::all();
        $user = User::all();
        $reservasi = Reservasi::all();
        return view('Customer.reservasi.base', compact('buku', 'user', 'reservasi'));
    }

    public function formreservasiCustomer(){
        $buku = Buku::all();
        $user = User::all();
        return view('Customer.reservasi.createReservasi', compact('buku', 'user'));
    }

    public function createreservasiCustomer(Request $request){
        Reservasi::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
        ]);
        return redirect()->route('Customer.reservasi.index')->with('create', "berhasi Menambahkan Data Reservasi");
    }
    public function editreservasiCustomer($id){
        $buku = Buku::all();
        $user = User::all();
        $reservasi = Reservasi::findOrFail($id);

        return view("Customer.reservasi.updateReservasi", compact("buku","user","reservasi"));
    }
    public function updatereservasiCustomer(Request $request, Reservasi $reservasi){
        $reservasi->update([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
        ]);
        $reservasi->update();
        return redirect()->route('Customer.reservasi.index')->with('update', "berhasil Update Data Reservasi");
    }
    public function deletereservasiCustomer($id){
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->back()->with('delete', "berhasil hapus data reservasi");
    }
}
