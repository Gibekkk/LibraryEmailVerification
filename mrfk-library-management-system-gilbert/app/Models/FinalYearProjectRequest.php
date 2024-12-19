<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalYearProjectRequest extends Model
{
    use HasFactory;

    protected $table = 'fyp_request';

    protected $fillable = [
        'title',
        'librarianID',
        'student_name',
        'supervisor',
        'submission_year',
        'abstract',
        'requestType',
    ];
}
