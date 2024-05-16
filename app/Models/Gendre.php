<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gendre extends Model
{
    use HasFactory;
    protected $table= 'gendres';

    protected $fillable = [
        'gendre',
        'slug'
    ];
}
