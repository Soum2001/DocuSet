<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAssetType extends Model
{
    use HasFactory;
    public $table='candidate_asset_type';
    public $timestamps = false;
}
