<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index(){
        $ulasan = Ulasan::all();

        return view("Customer.ulasan.base", compact("ulasan"));
    }
    public function formUlasanCustomer(){
        $user = User::all();
        $buku = Buku::all();
        $ulasan = Ulasan::all();
        return view ('Customer.ulasan.createUlasan', compact('user', 'buku', 'ulasan'));
    }

    public function createUlasanCustomer(Request $request){
        Ulasan::create([
            'buku_id'=>$request->buku_id,
            'user_id'=>$request->user_id,
            'komentar'=>$request->komentar,
            'rating'=>$request->rating
        ]);
        return redirect()->route('Customer.ulasan.index')->with('success', 'berhasil menambahkan data ulasan');
    }
    public function editUlasanCustomer($id){
        $buku = Buku::all();
        $user = User::all();
        $ulasan = Ulasan::findOrFail($id);

        return view('Customer.ulasan.updateUlasan', compact('buku', 'user', 'ulasan'));
    }
    public function updateUlasanCustomer(Request $request, Ulasan $ulasan){
        $ulasan->update([
            'buku_id'=>$request->buku_id,
            'komentar'=>$request->komentar,
            'rating'=>$request->rating,
        ]);
        $ulasan->update();
        return redirect()->route('Customer.ulasan.index')->with('Update', "Data Data Peminjaman Berhasil Di Update !");
    }
    public function deleteUlasanCustomer(Ulasan $ulasan){
        $ulasan = Ulasan::findOrFail($ulasan->id);
        $ulasan->delete();

        return redirect()->back()->with('delete', "berhasil Hapus Data Peminjaman");
    }
}
