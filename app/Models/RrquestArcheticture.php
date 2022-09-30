<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Http\Filters\RquestArchetictureFilter;
use App\Http\Filters\Filterable;

class RrquestArcheticture extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Filterable;

    protected $fillable = [
        'id',
        'description',
        'user_id',
        'type_id',
        'space',
        'comment',
    ];

    protected $filter = RquestArchetictureFilter::class;


    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function estateType()
    {
        return $this->belongsTo(Type::class, 'type_id')->withTrashed();
    }

}
