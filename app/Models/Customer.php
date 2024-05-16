<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";

    protected $fillable = [
        'user_id',
        'notelp',
        'img_customer',
    ];

    public function customer(){
        return $this->belongsto(User::class,'user_id', 'id');
    }
}
