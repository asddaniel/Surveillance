<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveillance extends Model
{
    /** @use HasFactory<\Database\Factories\SurveillanceFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "resume",
        "effectif"
    ];

    public function placements(){
        return $this->hasMany(Placement::class);
    }

}

