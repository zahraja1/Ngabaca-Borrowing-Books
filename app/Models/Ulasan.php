<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasans';

    protected $fillable = [
        'user_id',
        'buku_id',
        'komentar',
        'rating'
    ];

    public function customer(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

}
