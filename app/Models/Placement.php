<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    /** @use HasFactory<\Database\Factories\PlacementFactory> */
    use HasFactory;
    protected $fillable = [ 
        "student_id", 
        "code_id",
        "surveillance_id"
    ];
    public function surveillance(){
        return $this->belongsTo(Surveillance::class);
    }
    public function code(){
        return $this->belongsTo(Code::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }

}
