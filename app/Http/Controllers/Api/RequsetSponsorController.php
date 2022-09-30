<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequsetSponsor;
use App\Http\Requests\Api\RequsetSponsorRequest;
use App\Http\Resources\RequsetSponsorResource;


class RequsetSponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->type  == 0)
        {
            
            $statusScheduled = ['create','current'];
            $RequsetSponsos = auth()->user()->RequsetSponsors()->whereIn('stauts', $statusScheduled)
            ->orderBy('id', 'DESC')
            ->simplePaginate();
        }
        elseif($request->type  == 1)
        {
            $statusScheduled = ['finished','cancel'];
            $RequsetSponsos = auth()->user()->RequsetSponsors()->whereIn('stauts', $statusScheduled)
            ->orderBy('id', 'DESC')
            ->simplePaginate();
        }
        

        $num_request = auth()->user()->RequsetSponsors()->whereMonth('created_at','=', now())->count();
        $last_month = 12;
        $RequsetSponsos = $RequsetSponsos->withQueryString();
        return RequsetSponsorResource::collection($RequsetSponsos)->additional(compact('num_request','last_month'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequsetSponsorRequest $request)
    {
       
        $RequsetSponsor = new RequsetSponsor();
        $RequsetSponsor->user_id =auth()->user()->id;
        $RequsetSponsor->estate_id = $request->estate_id;
        $RequsetSponsor->type = $request->type;
        $RequsetSponsor->stauts = 'create';
        $RequsetSponsor->save();
        if ($request->hasFile('image')) {
            $RequsetSponsor->uploadFile('image');
        }

    
        return new RequsetSponsorResource($RequsetSponsor);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
