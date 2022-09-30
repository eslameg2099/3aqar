<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Office extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUploader;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'city_id',
        'certified_at',
        'classified_at',
        'active_at',
        'x',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    

    /**
     * The owner of the office.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(OfficeOwner::class, 'user_id');
    }

    /**
     * The city of the office.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the city of the office with it's parents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    /**
     * Set the "certified_at" attribute.
     *
     * @param $value
     */
    public function setCertifiedAtAttribute($value)
    {
        $this->attributes['certified_at'] = null;

        if ($value) {
            $this->attributes['certified_at'] = now();
        }
    }

   


    /**
     * Set the "classified_at" attribute.
     *
     * @param $value
     */
    public function setClassifiedAtAttribute($value)
    {
        $this->attributes['classified_at'] = null;

        if ($value) {
            $this->attributes['classified_at'] = now();
        }
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('office_logo')
            ->singleFile();    
    }

    
}
