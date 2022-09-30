<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RrquestArcheticture;

class RquestArchetictureController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Archeticture::class);

        $RrquestArchetictures = RrquestArcheticture::filter()->paginate();
        return view('dashboard.rquestarcheticture.index', compact('RrquestArchetictures'));
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
        $this->authorize('viewAny', Archeticture::class);

        $RrquestArcheticture = RrquestArcheticture::findorfail($id);
        return view('dashboard.rquestarcheticture.show', compact('RrquestArcheticture'));
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
        $this->authorize('viewAny', Archeticture::class);

        $RrquestArcheticture = RrquestArcheticture::findorfail($id);
        return view('dashboard.rquestarcheticture.edit', compact('RrquestArcheticture'));        //
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
        $RrquestArcheticture = RrquestArcheticture::findorfail($id);
        $RrquestArcheticture->update($request->all());
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('dashboard.rquestarchetictures.show', $RrquestArcheticture);           //
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
