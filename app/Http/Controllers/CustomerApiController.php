<?php

namespace App\Http\Controllers;

use App\Helpers\FormartHelper;
use App\Helpers\MessageHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerApiController extends Controller
{
    public function index(){
        $customer = User::where('role', 2)
        ->get()
        ->map(function($customer){
            return FormartHelper::formartResaultAuth($customer);
        });
        $pesan = "berhasil memnampilkan data customer";
        return MessageHelper::resultAuth(true, $pesan, $customer, 200);
    }

    public function customerTambah(Request $request){
        $validasi = Validator::make($request->all(),[
            'name'=>['required', 'string', 'max:225'],
            'email'=>['required', 'string', 'email', 'max:225', 'unique'],
            'password'=>['required', 'string'],
            'img_customer'=>['required'],
        ]);
        if($validasi->fails()){
            $valindex=$validasi->errors()->all();
            return MessageHelper::error(false, $valindex[0]);
        }
        $customer = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'role'=>2,
            'password'=> Hash::make($request->password),
            'img_customer'=>$request->file('img_customer')->store('img-customer'),
        ]);
        $detail = FormartHelper::resultUser($customer->id);
        $pesan = "berhsil menambahkan data mentor";
        return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }

    public function customerHapus(Request $request){
        $customer = User::where('id', $request->id)->first();

        if(!$customer){
            return MessageHelper::error(false,"data tidak ditemukan");
        }
        Storage::delete($customer->img_customer);
        $customer->delete();
        return MessageHelper::error(true, 'berhasil hapus data');
    }
    public function customerUpdate(Request $request, $id){
        $customer = User::where('id', $id)->first();
        if(!$customer){
            return MessageHelper::error(false,"data tidak ditemukan");
        }

        if($customer->role !==2){
            return MessageHelper::error(false,"anda bukan admin");
        }

        
            $validasi = Validator::make($request->all(),[
                'name' => ['required'],
                'username' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6'],
            ]);
            if($validasi->fails()){
                $valindex= $validasi->errors()->all();
                return MessageHelper::error(false, $valindex[0]);
            }

            $customer->update([
                'name'=>$request->name,,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $detail = FormartHelper::resultUser($customer->id);
            $pesan = "baerhsail menambahkan data customer";
            return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }
}
