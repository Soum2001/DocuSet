<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAcademics extends Model
{
    use HasFactory;
    public $table='candidate_academics';
    public $timestamps = false;
    protected $fillable = [
        'board',
        'passout_year',
        'percentage',
        'user_id',
    ];
}
