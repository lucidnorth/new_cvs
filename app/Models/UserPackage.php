<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'amount',
        'searches_left',
        'transaction_reference',
        'payment_status',
        'expires_at',
        'price_per_search',
        'amount_given_to_institution'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getTotalSearchesAllowed()
    {
        return $this->package->search_limit;
    }

    public function searchLogs()
{
    return $this->hasMany(SearchLog::class);
}

}




























