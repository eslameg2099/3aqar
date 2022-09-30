<?php

namespace App\Http\Controllers\Api;

use App\Models\EngineeringOffice;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\EngineeringOfficeResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\Dashboard\EngineeringOfficeRequest;

class EngineeringOfficeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the engineering_offices.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $engineering_offices = EngineeringOffice::active()->filter()->simplePaginate();

        return EngineeringOfficeResource::collection($engineering_offices);
    }

    public function store(EngineeringOfficeRequest $request)
    {
        $engineering_office = EngineeringOffice::create($request->all());

        if ($request->hasFile('image')) {
            $engineering_office->addMediaFromRequest('image')
                ->toMediaCollection('default');
        }

        return new EngineeringOfficeResource($engineering_office);

    }

    /**
     * Display the specified engineering_office.
     *
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return \App\Http\Resources\EngineeringOfficeResource
     */
    public function show(EngineeringOffice $engineering_office)
    {
        return new EngineeringOfficeResource($engineering_office);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $engineering_offices = EngineeringOffice::filter()->simplePaginate();

        return SelectResource::collection($engineering_offices);
    }
}
