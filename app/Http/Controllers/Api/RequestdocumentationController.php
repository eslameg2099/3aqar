<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requestdocumentation;

class RequestdocumentationController extends Controller
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
    public function store(Request $request)
    {

        $Requestdocumentation = new Requestdocumentation();
        $Requestdocumentation->user_id = auth()->user()->id ; 
        $Requestdocumentation->save();


        if ($request->hasFile('image_Traderegister')) {
            $Requestdocumentation->addMediaFromRequest('image_Traderegister')
                ->toMediaCollection('Requestdocumentation');
        }

        


        if ($request->hasFile('image_Certificateofdocumentation')) {
            $Requestdocumentation->addMediaFromRequest('image_Certificateofdocumentation')
                ->toMediaCollection('Requestdocumentation');
        }

        return response()->json([
            'message' => "تم الاضافة بنجاح",
        ]);        
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
