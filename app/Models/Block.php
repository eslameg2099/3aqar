<?php

namespace App\Models;
use App\Http\Filters\BlockFilter;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'id',
        'user_id',
        'block_id',
        
    ];

    protected $filter = BlockFilter::class;


    public function user()
    {
        return $this->belongsTo(User::class,'block_id')->withTrashed();
    }


}
