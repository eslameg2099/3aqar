<?php

namespace App\Models;

use App\Http\Filters\CityFilter;
use App\Http\Filters\Filterable;
use App\Models\Concerns\HasParents;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use Filterable;
    use Selectable;
    use HasParents;
    use SoftDeletes;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'parents' => 'array',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = CityFilter::class;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany\
     */
    public function estates()
    {
        return $this->belongsToMany(Estate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active','1');
    }

    public function getcity($id)
    {
        $like = City::where('id',$id)->first();
        return $like;


    }

    

}
