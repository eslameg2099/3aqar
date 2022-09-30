<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\ReportFilter;
use App\Http\Filters\Filterable;

class Report extends Model
{
    use HasFactory;
    use Filterable;

    protected $filter = ReportFilter::class;

    protected $fillable = [
        'id',
        'user_id',
        'estate_id',
        'message',
        'status',
        'comment',
        'engineeringoffice_id',
        'contractor_id',
        'expert_id',
        'type',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function estate()
    {
        return $this->belongsTo(Estate::class,'estate_id');
    }

    public function engineeringoffice()
    {
        return $this->belongsTo(EngineeringOffice::class,'engineeringoffice_id');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class,'contractor_id');
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class,'expert_id');
    }

    public function OfficeOwner()
    {
        return $this->belongsTo(OfficeOwner::class,'estateoffice_id');
    }
}
