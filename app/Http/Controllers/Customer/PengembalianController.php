<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(){
        $user = User::all();
        $peminjaman = Peminjaman::all();
        $pengembalian = Pengembalian::all();
        return view ('Customer.pengembalianCustomer.base', compact('pengembalian', 'user', 'peminjaman'));

    }
    public function formPengembalianCustomer(){
        $user = User::all();   
        $peminjaman = Peminjaman::all();
        $buku = Buku::all();
        return view("Customer.pengembalianCustomer.createPengembalian", compact('user', 'peminjaman', 'buku'));
    }
    public function createPengembalianCustomer(Request $request){
        Pengembalian::create([
            'user_id'=>$request->user_id,
            'buku_id'=>$request->buku_id,
            'peminjaman_id'=>$request->peminjaman_id,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
        ]);

        return redirect()->route('Customer.index.pengembalian')->with('Create', "Berhasil Menambahkan Data Pengembalian Buku");
  
    }
    public function editPengembalianCustomer($id){
        $user = User::all();  
        $peminjaman = Peminjaman::all();
        $pengembalian = Pengembalian::findOrFail($id);

        return view('Customer.pengembalianCustomer.updatePengembalian', compact('peminjaman', 'user', 'pengembalian'));
  
    }
    public function updatePengembalianCustomer(Request $request, $id){

        $pengembalian= Pengembalian::findOrFail($id);
        $pengembalian->update([
            'user_id'=>$request->user_id,
            'peminjaman_id'=>$request->peminjaman_id,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
        ]);
        return redirect()->route('Customer.index.pengembalian')->with('Update', "Data Pengembalian Berhasil Di Update !");
 
    }
    public function deletePengembalianCustomer($id){
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->back()->with("delete", "berhasil hapus data");
    }

}
