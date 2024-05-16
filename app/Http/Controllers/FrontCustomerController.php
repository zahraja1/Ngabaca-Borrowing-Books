<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Gendre;
use App\Models\Jenis;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontCustomerController extends Controller
{
    public function customer(){
        $buku = Buku::all();
        $gendre = Gendre::all();
        return Inertia('Customer',[
            'buku'=>$buku,
            'gendre'=>$gendre,
        ]);
    }
    public function komentar(){
        return Inertia('Komentar');
    }

    public function Borrow(){
        $peminjaman = Peminjaman::all();
        return Inertia('Borrow', compact('peminjaman'));
    }

    public function BorrowCreate( Request $request){
         // Validate the form data
         $validatedData = $request->validate([
            'user_id' => 'required|string',
            'buku_id' => 'required|string',
            'tanggal_peminjaman' => 'required|string',
            'Tanggal_pengembalian' => 'required|string',
            'kode_peminjaman' => 'required|string',
        ]);

        // Create a new FormSubmission model and save to the database
        $formSubmission = Peminjaman::create($validatedData);

        // You can return a response to the frontend if needed
        return response()->json(['message' => 'Form submitted successfully', 'data' => $formSubmission]);
    }
    
    public function arsip(){
        return Inertia('Arsip');
    }

    public function LandingCustomer(){
        $buku = Buku::all();
        return Inertia('LandingCustomer', [
            'buku' => $buku,
        ]);
    }


    public function peminjaman(){
        $peminjaman = Peminjaman::all();
        return Inertia('Peminjaman', [
            'peminjaman'=>$peminjaman,
        ]);
    }
    public function pengembalian(){
        $pengembalian = Pengembalian::all();
        return Inertia('Pengembalian', [
            'pengembalian'=>$pengembalian,
        ]);
    }

    public function NavbarCustomerDepan(){
        return Inertia('NavbarCustomerDepan');
    }
   
    public function filter(){
        $buku = Buku::where('jenis_id', 9)->get();
        return Inertia ('Filter', compact('buku'));
    }
   
   
    public function nonfiksi(){
        $buku = Buku::where('jenis_id', 10)->get();
        return Inertia ('Nonfiksi', compact('buku'));
    }
    public function romance(){
        $buku = Buku::where('gendre_id', 1)->get();
        return Inertia ('Romance', compact('buku'));
    }
    public function populer(){
        $buku = Buku::where('gendre_id', 1)->get();
        return Inertia ('Buku Populer', compact('buku'));
    }
    public function fantacy(){
        $buku = Buku::where('gendre_id', 2)->get();
        return Inertia ('Fantacy', compact('buku'));
    }
    public function ilmiah(){
        $buku = Buku::where('gendre_id', 6)->get();
        return Inertia ('Ilmiah', compact('buku'));
    }
    public function review($id){
        $buku = Buku::findOrFail($id);
        $gendre = Gendre::all();
        return Inertia('Review', compact('buku', 'gendre'));
    }
    public function revie($id){
       $ulasan = Ulasan::findOrFail($id);
        return Inertia('Revie', compact('ulasan'));
    }

}
