<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    protected $fillable= [
        "name", 
        "promotion_id"
    ];

    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }

}
