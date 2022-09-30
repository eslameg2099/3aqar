<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eslam extends Model
{
    use HasFactory;

    protected $hidden = ['id','type_id','cutom_id','created_at','updated_at'];
    
    public function option(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CustomField::class, 'model_id');
    }
}
