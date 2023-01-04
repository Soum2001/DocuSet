<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateDetails extends Model
{
    use HasFactory;
    public $table='candidate_details';
    public $timestamps = false;
}
