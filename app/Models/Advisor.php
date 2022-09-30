<?php

namespace App\Models;
use App\Http\Filters\Filterable;
use App\Http\Filters\AdvisorFilter;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;
    use Filterable;

    protected $filter = AdvisorFilter::class;

    protected $fillable = [
        'id',
        'city_id',
        'price'
    ];

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }

}
