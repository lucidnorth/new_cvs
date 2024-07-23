<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackageInstitution extends Model
{
    protected $fillable = [
        'user_package_id',
        'institution_id',
        'amount_given_to_institution',
    ];

    public function userPackage()
    {
        return $this->belongsTo(UserPackage::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
