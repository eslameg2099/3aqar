<?php

namespace App\Models;

use Parental\HasParent;
use App\Http\Filters\OfficeOwnerFilter;
use App\Http\Resources\OfficeOwnerResource;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class OfficeOwner extends User
{
    use HasFactory;
    use HasParent;
    use SoftDeletes;

    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = OfficeOwnerFilter::class;

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     */
    public function getMorphClass()
    {
        return User::class;
    }

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'user_id';
    }

    /**
     * @return \App\Http\Resources\OfficeOwnerResource
     */
    public function getResource()
    {
        return new OfficeOwnerResource($this);
    }

    public function ismyoffice($id,$Office)
    {
        $Office = User::where('id',$id)->where('id',$Office)->first();
        if($Office != null)
        {
            return 1;
        }
        else
        return 0;
    }

    /**
     * Get the dashboard profile link.
     */
    public function dashboardProfile(): string
    {
        return route('dashboard.offices.show', $this);
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'user_id');
    }
}
