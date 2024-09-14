<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use DateTimeInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\SearchLog;

class Institution extends Model implements HasMedia, Authenticatable
{ 
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, Auditable, HasFactory, Notifiable;

    public $table = 'institutions';

    protected $appends = [
        'logo',
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
    
       
        'institutions',
        'address',
        'phone',
        'email',
        'password',
        'fullname',
        'country',
        'location',
        'website',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function institutionCertificates()
    {
        return $this->hasMany(Certificate::class, 'institution_id', 'id');
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    // Implementing methods from Authenticatable interface

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
   
    public function papers()
    {
        return $this->hasMany(Paper::class);
    }

    public function searchLogs()
    {
        return $this->hasManyThrough(SearchLog::class, Certificate::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
