<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable =[
        'judul',
        'penerbit',
        'penulis',
        'tahun_terbit',
        'ISBN',
        'isEbook',
        'ebookLink',
        'isBorrowed',
    ];
}
