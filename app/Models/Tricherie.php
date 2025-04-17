<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tricherie extends Model
{
    /** @use HasFactory<\Database\Factories\TricherieFactory> */
    use HasFactory;
    protected $fillable = [
        "student_id", 
        "surveillance_id", 
        "rapport",
    ];

    public function student(){

        return $this->hasOne(Student::class);
    }

    public function surveillance(){

        return $this->belongsTo(Surveillance::class);
    }

}
