<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalYearProject extends Model
{
    use HasFactory;

    protected $table = 'final_year_projects';

    protected $fillable = [
        'title',
        'student_name',
        'supervisor',
        'submission_year',
        'abstract',
    ];
}
