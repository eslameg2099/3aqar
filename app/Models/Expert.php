<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Http\Filters\ExpertFilter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Expert extends Model implements HasMedia, TranslatableContract
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUploader;
    use Filterable;
    use Selectable;
    use SoftDeletes;
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     * 
     * 
     */
    public $translatedAttributes = ['name','description'];

    protected $with = [
        'media','translations',
    ];


    public function scopeActive($query)
    {
        return $query->where('stauts','1');
    }

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     * 
     * 
     */

    protected $filter = ExpertFilter::class;


    protected $fillable = [
        'city_id',
        'email',
        'phone',
        'stauts',
    ];

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



}
