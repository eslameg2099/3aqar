<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ContractorResource;
use App\Http\Resources\SelectResource;
use App\Models\Contractor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\ContractorRequest;

class ContractorController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the contractors.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $contractors = Contractor::active()->filter()->simplePaginate();

        return ContractorResource::collection($contractors);
    }

    /**
     * Display the specified contractor.
     *
     * @param \App\Models\Contractor $contractor
     * @return \App\Http\Resources\ContractorResource
     */
    public function show(Contractor $contractor)
    {
        return new ContractorResource($contractor);
    }

    public function store(ContractorRequest $request)
    {
        $contractor = Contractor::create($request->all());
        if ($request->hasFile('image')) {
            $contractor->addMediaFromRequest('image')
                ->toMediaCollection('default');
        }
        return new ContractorResource($contractor);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $contractors = Contractor::filter()->simplePaginate();

        return SelectResource::collection($contractors);
    }
}
