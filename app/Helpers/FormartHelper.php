<?php
namespace App\Helpers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;

class FormartHelper{
    public static function formartResaultAuth($user){
        return[
            'Userid'=>$user->id,
            'nama'=>$user->name,
            'username'=>$user->username,
            'email'=>$user->email,
            'tanggal_daftar'=>Carbon::parse($user->created_at)->translatedFormat('d F Y'),
        ];
    }

    public static function resultUser($user_id){
        $user = User::where('id', $user_id)
        ->get()
        ->map(function($user){
          return FormartHelper::formartResaultAuth($user);
        });

        return $user;
    }
}