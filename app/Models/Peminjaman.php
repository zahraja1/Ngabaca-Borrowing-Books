<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';

    protected $fillable =[
        'user_id',
        'buku_id',
        'kode_peminjaman',
        'tanggal_peminjaman',
        'tanggal_pengembalian'
    ];

    public function customer(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}
