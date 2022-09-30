<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\TypeFilter;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasCustomFields;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use Filterable;
    use Selectable;
    use HasCustomFields;
    use SoftDeletes;

    /**
     * Get The code of rent type.
     *
     * @var int
     */
    const RENT_TYPE = 0;

    /**
     * Get The code of selling type.
     *
     * @var int
     */
    const SELLING_TYPE = 1;

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
        'type',
        'active',
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
    protected $filter = TypeFilter::class;

   

    public function option()
    {
        return $this->hasMany(Optioncustom::class,'type_id');
    }




    public function CustomFields()
    {
        return $this->hasMany(CustomField::class,'model_id');
    }

    
}
