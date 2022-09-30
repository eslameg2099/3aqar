<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountBank;
use App\Models\RequsetDischarge;
use App\Http\Requests\Api\AccountBankRequest;
use App\Http\Resources\AccountBankResource;
class AccountBankController extends Controller
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
        $AccountBank = AccountBank::first();
        return new AccountBankResource($AccountBank);

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
    public function store(AccountBankRequest $request)
    {

        $RequsetDischarge = new RequsetDischarge();
        $RequsetDischarge->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $RequsetDischarge->addMediaFromRequest('image')
                ->toMediaCollection('RequsetDischarges');
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
