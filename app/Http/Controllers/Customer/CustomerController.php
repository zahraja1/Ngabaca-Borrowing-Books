<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(){
        return view('Customer.index');
    }
    public function buku(){

        $buku = Buku::where('customer_id', Auth::user()->id)->get();
        return view('Customer.MYBuku', compact('buku'));
    }

    public function profile(){

        $id = Auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('Customer.profileCustomer', compact('user'));
    }

}
