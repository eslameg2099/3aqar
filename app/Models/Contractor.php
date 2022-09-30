<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Concerns\HasMediaTrait;

use App\Http\Filters\ContractorFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
class Contractor extends Model implements HasMedia, TranslatableContract
{

    use HasFactory;
    use InteractsWithMedia;
    use HasUploader;
    use Filterable;
    use Selectable;
    use SoftDeletes;
    use Translatable;

    public $translatedAttributes = ['name','description'];


    protected $fillable = [
        'city_id',
        'email',
        'phone',
        'stauts'
    ];
   

    protected $with = [
        'translations','media',
        
    ];


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
   
    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = ContractorFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function scopeActive($query)
    {
        return $query->where('stauts','1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('default')->singleFile();

    }
}
