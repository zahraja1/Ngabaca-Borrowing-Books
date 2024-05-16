<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormartHelper;
use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function register(Request $request){
        $validasi = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        if($validasi->fails()){
            $valindex= $validasi->errors()->all();
        //    return $this->errorWoe($valindex[0]);
        
        // helper bisa dipake kemana-mana
        return MessageHelper::error(false, $valindex[0]);
        }

        $user= User::create([
            'name' => $request->name,
            'username' => $request->username, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Customer::create([
            'user_id'=>$user->id,
            'notlep'=>$request->notelp,
        ]);

       $detail = FormartHelper::resultUser($user->id);

        $pesan = "berhasil ragister";
      return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }

    // buAT LOGINNNN
    public function login(Request $request){
        $validasi = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
    ]);
    if($validasi->fails()){
        $valindex= $validasi->errors()->all();
    return MessageHelper::error(false, $valindex[0]);
    }

    $user = User::where('email', $request->email)->first();

    // if($user){
    //     return $user;
    // }else{
    //     return "daftar Duluuuuuuuu";
    // }
    // }
    if($user){

        if(password_verify($request->password, $user->password)){
            $detail = FormartHelper::resultUser($user->id);

        $pesan = "berhasil ragister";
      return MessageHelper::resultAuth(true, $pesan, $detail, 200);
        }else{
            return "password salah";
        }
    }else{
    return "daftar dulu ga sie";
    }
 }
}
