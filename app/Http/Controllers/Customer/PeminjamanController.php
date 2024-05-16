<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Customer;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(){
        $buku = Buku::all();
        $customer = Customer::all();
        $peminjaman = Peminjaman::all();
        return view('Customer.peminjamanCustomer.base', compact('peminjaman', 'buku', 'customer'));
  
    }
    public function formPeminjamanCustomer(){
        $user = User::all();
        $buku = Buku::all();
         $peminjaman = Peminjaman::all();
 
         return view('Customer.peminjamanCustomer.createPeminjaman', compact('peminjaman', 'buku', 'user'));
   
    }
    public function createPeminjamanCustomer(Request $request){
        Peminjaman::create([
            'buku_id' => $request->buku_id,
            'user_id' => $request->user_id,
            'kode_peminjaman' => $request->kode_peminjaman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian, 
        ]);
    
        return redirect()->route('Customer.index.peminjaman')->with('success', 'Berhasil Memperbarui Data Peminjaman');
    
    }
    public function editPeminjamanCustomer($id){
        $user = User::all();
        $buku = Buku::all();
        $peminjaman = Peminjaman::findOrFail($id);

        return view('Customer.peminjamanCustomer.updatePeminjaman', compact('buku','user','peminjaman'));
   
    }
    public function updatePeminjamanCustomer(Request $request, Peminjaman $peminjaman){
        $peminjaman->update([
            'buku_id'=>$request->buku_id,
            'user_id'=>$request->user_id,
            'kode_peminjaman'=>$request->kode_peminjaman,
            'tanggal_peminjaman'=>$request->tanggal_peminjaman,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
        ]);
        $peminjaman->update();
        return redirect()->route('Customer.index.peminjaman')->with('Update', "Data Peminjaman Berhasil Di Update !");
   
    }
    public function deletePeminjamanCustomer($id){
        
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->back()->with('delete', "berhasil Hapus Data Peminjaman");
  
    }
}
