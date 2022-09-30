<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EstateResource;
use App\Http\Resources\OfficeOwnerResource;
use App\Models\OfficeOwner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class OfficeOwnerController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'show', 'getEstates');
    }
    /**
     * Get a list of all the office owners.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $officeOwners = OfficeOwner::filter()->simplePaginate();

        return OfficeOwnerResource::collection($officeOwners);
    }

    /**
     * Display the authenticated user resource.
     *
     * @param \App\Models\OfficeOwner $officeOwner
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(OfficeOwner $officeOwner)
    {
        return $officeOwner->getResource()->additional([
            'estates' => EstateResource::collection(
                $officeOwner->estates()->active()->filter()->latest()->limit(10)->get()
            ),
        ]);
    }

    /**
     * Display the authenticated user resource.
     *
     * @param \App\Models\OfficeOwner $officeOwner
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function getEstates(OfficeOwner $officeOwner)
    {
        $estates = $officeOwner->estates()->active()->filter()->simplePaginate();

        return EstateResource::collection($estates);
    }

    public function officelogin()
    {
        $officeOwner = OfficeOwner::where('id',auth()->user()->id)->firstorfail();

       return $officeOwner->getResource()->additional([
            'estates' => EstateResource::collection(
                $officeOwner->estates()->active()->filter()->latest()->limit(10)->get()
            ),
        ]); 

   }

   public function getEstatesforoffice()
   {
       $officeOwner = OfficeOwner::where('id',auth()->user()->id)->firstorfail();

       $estates = $officeOwner->estates()->active()->filter()->simplePaginate();

       return EstateResource::collection($estates);
   }



}
