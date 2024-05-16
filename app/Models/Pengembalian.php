<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';

    protected $fillable = [
        'user_id',
        'buku_id',
        'peminjaman_id',
        'tanggal_pengembalian'
    ];
    public function customer(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'id');
    }
    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}
