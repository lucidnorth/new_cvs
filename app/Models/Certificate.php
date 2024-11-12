<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Certificate extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'certificates';

    public const GENDER_SELECT = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'year_of_entry',
        'year_of_completion',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'photo',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'institution_id',
        'created_at',
        'certificate_number',
        'student_identification',
        'qualification_type',
        'programme',
        'class',
        'year_of_entry',
        'year_of_completion',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->photo);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }


    public function setDateOfBirthAttribute($value)
    {
        if ($value) {
            try {
                $this->attributes['date_of_birth'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
            } catch (\Exception $e) {
                // Handle error or fallback to another format
                $this->attributes['date_of_birth'] = Carbon::parse($value)->format('Y-m-d');
            }
        } else {
            $this->attributes['date_of_birth'] = null;
        }
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function searchLogs()
    {
        return $this->hasMany(SearchLog::class, 'search_term', 'certificate_number');
    }


    public function getYearOfEntryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y') : null; // Only the year
    }

    public function setYearOfEntryAttribute($value)
    {
        $this->attributes['year_of_entry'] = $value ? Carbon::createFromFormat('Y', $value)->format('Y-m-d') : null;
    }

    public function getYearOfCompletionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y') : null; // Only the year
    }

    public function setYearOfCompletionAttribute($value)
    {
        $this->attributes['year_of_completion'] = $value ? Carbon::createFromFormat('Y', $value)->format('Y-m-d') : null;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
