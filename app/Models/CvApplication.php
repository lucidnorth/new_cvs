<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'message', 
        'phone', 
        'country', 
        'cv_path'
    ];
}
