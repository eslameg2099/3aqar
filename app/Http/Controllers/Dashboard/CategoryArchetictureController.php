<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\CategoryArcheticture;
use App\Http\Requests\Dashboard\CategoryArchetictureRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryArchetictureController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', CategoryArcheticture::class);

        $CategoryArchetictures = CategoryArcheticture::filter()->paginate();
        return view('dashboard.categoryarcheticture.index', compact('CategoryArchetictures'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', CategoryArcheticture::class);

        return view('dashboard.categoryarcheticture.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryArchetictureRequest $request)
    {
        $CategoryArcheticture = CategoryArcheticture::create($request->all());

        $CategoryArcheticture->addAllMediaFromTokens();

        flash()->success(trans('CategoryArcheticture.messages.created'));

        return redirect()->route('dashboard.categoryarcheticture.show', $CategoryArcheticture);
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
        $this->authorize('viewAny', CategoryArcheticture::class);

        $CategoryArcheticture = CategoryArcheticture::findorfail($id);
        return view('dashboard.categoryarcheticture.show', compact('CategoryArcheticture'));
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
        $this->authorize('viewAny', CategoryArcheticture::class);

        $CategoryArcheticture = CategoryArcheticture::findorfail($id);
        return view('dashboard.categoryarcheticture.edit', compact('CategoryArcheticture'));
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
        $CategoryArcheticture = CategoryArcheticture::findorfail($id);

        $CategoryArcheticture->update($request->all());

        $CategoryArcheticture->addAllMediaFromTokens();

        flash()->success(trans('CategoryArcheticture.messages.updated'));

        return redirect()->route('dashboard.categoryarcheticture.show', $CategoryArcheticture);
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
        $this->authorize('viewAny', CategoryArcheticture::class);

        $CategoryArcheticture = CategoryArcheticture::findorfail($id);

        $CategoryArcheticture->delete();

        flash()->success(trans('CategoryArcheticture.messages.deleted'));

        return redirect()->route('dashboard.categoryarcheticture.index');
        //
    }

    public function trashed()
    {

        $CategoryArchetictures = CategoryArcheticture::onlyTrashed()->paginate();

        return view('dashboard.categoryarcheticture.trashed', compact('CategoryArchetictures'));
    }

    public function showTrashed($id)
    {
        
        $CategoryArcheticture = CategoryArcheticture::withTrashed()->findorfail($id);

        return view('dashboard.categoryarcheticture.show', compact('CategoryArcheticture'));
    }

    public function restore($id)
    {
        $CategoryArcheticture =  CategoryArcheticture::withTrashed()->findorfail($id);
        $CategoryArcheticture->restore();
        flash()->success(trans('CategoryArcheticture.messages.restored'));
        return redirect()->route('dashboard.categoryarcheticture.trashed');
    }

    public function forceDelete($id)
    {
        $CategoryArcheticture =  CategoryArcheticture::withTrashed()->findorfail($id);

        $CategoryArcheticture->forceDelete();

        flash()->success(trans('CategoryArcheticture.messages.deleted'));

        return redirect()->route('dashboard.categoryarcheticture.trashed');
    }
}
