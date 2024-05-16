<?php

namespace App\Helpers;

class MessageHelper{
    public static function error($status, $message){
        return response()->json([
            'status'=>false,
            'message'=>$message,
        ], 200);
    }

    public static function resultAuth($message, $data, $status, $responCode){
        return response()->json([
            'status'=>$status,
            'message'=> $message,
            'data'=> $data,
        ], $responCode);
    }
}