<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','las_name','age','card','email'];

    public function course(){
        return $this->belongsToMany(Course::class);
    }
}
