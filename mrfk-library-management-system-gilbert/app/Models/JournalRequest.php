<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalRequest extends Model
{
    use HasFactory;

    protected $table = 'journal_request';

    protected $fillable =[
        'judul',
        'librarianID',
        'penerbit',
        'penulis',
        'tahun_terbit',
        'ISBN',
        'requestType',
    ];
}
