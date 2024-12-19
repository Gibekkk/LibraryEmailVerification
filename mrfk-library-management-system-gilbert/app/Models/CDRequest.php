<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDRequest extends Model
{
    use HasFactory;

    protected $table = 'cds_request';

    protected $fillable = [
        'title',
        'librarianID',
        'artist',
        'publisher',
        'release_year',
        'genre',
        'isEbook',
        'ebookLink',
        'requestType',
    ];
}
