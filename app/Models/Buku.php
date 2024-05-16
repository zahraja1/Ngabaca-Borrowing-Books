<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';

    protected $fillable = [
        'gendre_id',
        'jenis_id',
        'judul',
        'author',
        'thumbnail',
        'slug',
        'slug',
    ];

    public function jeniss(){
        return $this->belongsTo(Jenis::class, 'jenis_id', 'id');
    }
    public function gendres(){
        return $this->belongsTo(Gendre::class, 'gendre_id', 'id');
    }
    public function customer(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
