<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'search_limit'
        ];

        public function userPackages()
{
    return $this->hasMany(UserPackage::class);
}



    
}
