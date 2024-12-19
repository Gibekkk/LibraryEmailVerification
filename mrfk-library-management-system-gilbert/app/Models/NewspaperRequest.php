<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewspaperRequest extends Model
{
    use HasFactory;

    protected $table = 'newspaper_request';

    protected $fillable = [
        'name',
        'librarianID',
        'publication_date',
        'publisher',
        'language',
        'requestType',
    ];
}
