<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    /** @use HasFactory<\Database\Factories\CodeFactory> */
    use HasFactory;
    protected $fillable = [
        'value', 
        "surveillance_id"
    ];

    public function surveillance(){
        return $this->belongsTo(Surveillance::class);
    }

}
