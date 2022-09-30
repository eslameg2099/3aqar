<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Block;
use App\Http\Requests\Api\BlockRequest;
use App\Http\Resources\BlockResource;

use App\Http\Requests\Api\EstateRequest;


class BlockController extends Controller
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
        $Blocks = auth()->user()->Blocks()->filter()->simplePaginate();
        return BlockResource::collection($Blocks);

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
    public function store(BlockRequest $request)
    {
        $Block = Block::where('user_id',auth()->user()->id)->where('block_id',$request->block_id)->first();
        if($Block == null)
        {
            $Block = new Block();
            $Block->user_id = auth()->user()->id ;
            $Block->type = User::find($request->block_id)->type ;
            $Block->block_id = $request->block_id;
            $Block->save();
            return response()->json([
                'message' => trans('block.messages.create'),
            ]);
        }
        else
        return response()->json([
            'message' => trans('block.messages.ready'),
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
        return $id;
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
        $Block = Block::where('user_id',auth()->user()->id)->where('block_id',$id)->firstorfail();
        $Block->delete();
        return response()->json([
            'message' => trans('block.messages.delete'),
        ]);


        //
    }
}
