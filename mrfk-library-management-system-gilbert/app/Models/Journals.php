<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journals extends Model
{
    use HasFactory;

    protected $table = 'journals';

    protected $fillable =[
        'judul',
        'penerbit',
        'penulis',
        'tahun_terbit',
        'ISBN',
    ];
}
