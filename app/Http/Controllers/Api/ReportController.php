<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Requests\Api\ReportRequest;

class ReportController extends Controller
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
    public function index()
    {
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
    public function store(ReportRequest $request)
    {
        
        $Report = new Report();

        $Report->user_id = auth()->user()->id ; 

        $Report->type = $request->type ; 

        if($request->type == 'estate')
        {
            $Report->estate_id  = $request->item_id ; 
        }
        elseif($request->type == 'engineeringoffice')
        {
            $Report->engineeringoffice_id  = $request->item_id ; 

        }
        elseif($request->type == 'contractor')
        {
            $Report->contractor_id  = $request->item_id ; 

        }
        elseif($request->type == 'expert')
        {
            $Report->expert_id  = $request->item_id ; 

        }
        elseif($request->type == 'estateoffice')
        {
            $Report->estateoffice_id  = $request->item_id ; 

        }
        
        
        $Report->message = $request->message ; 
        $Report->save();
        return response()->json([
            'message' => "تم الارسال بنجاح",
        ],200);
        //
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
