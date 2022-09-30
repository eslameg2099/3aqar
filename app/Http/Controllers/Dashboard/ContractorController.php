<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ContractorRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class ContractorController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Contractor::class);

        $contractors = Contractor::orderBy('id', 'DESC')->filter()->paginate();

        return view('dashboard.contractors.index', compact('contractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', Contractor::class);

        return view('dashboard.contractors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ContractorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContractorRequest $request)
    {
        $contractor = Contractor::create($request->all());

        $contractor->addAllMediaFromTokens();

        flash()->success(trans('contractors.messages.created'));

        return redirect()->route('dashboard.contractors.show', $contractor);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contractor $contractor
     * @return \Illuminate\Http\Response
     */
    public function show(Contractor $contractor)
    {
        $this->authorize('viewAny', Contractor::class);

        return view('dashboard.contractors.show', compact('contractor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contractor $contractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractor $contractor)
    {
        $this->authorize('viewAny', Contractor::class);

        return view('dashboard.contractors.edit', compact('contractor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ContractorRequest $request
     * @param \App\Models\Contractor $contractor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContractorRequest $request, Contractor $contractor)
    {
        $contractor->update($request->all());

        $contractor->addAllMediaFromTokens();

        flash()->success(trans('contractors.messages.updated'));

        return redirect()->route('dashboard.contractors.show', $contractor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Contractor $contractor
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contractor $contractor)
    {
        $this->authorize('viewAny', Contractor::class);

        $contractor->delete();

        flash()->success(trans('contractors.messages.deleted'));

        return redirect()->route('dashboard.contractors.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Contractor::class);

        $contractors = Contractor::onlyTrashed()->paginate();

        return view('dashboard.contractors.trashed', compact('contractors'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Contractor $contractor
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Contractor $contractor)
    {
        $this->authorize('viewAny', Contractor::class);

        return view('dashboard.contractors.show', compact('contractor'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Contractor $contractor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Contractor $contractor)
    {
        $this->authorize('viewAny', Contractor::class);

        $contractor->restore();

        flash()->success(trans('contractors.messages.restored'));

        return redirect()->route('dashboard.contractors.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Contractor $contractor
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Contractor $contractor)
    {
        $this->authorize('viewAny', Contractor::class);

        $contractor->forceDelete();

        flash()->success(trans('contractors.messages.deleted'));

        return redirect()->route('dashboard.contractors.trashed');
    }

    public function active($id)
    {
        DB::table('contractors')->where('id', $id)
        ->update(['stauts' => '1']);
        flash()->success('تم بنجاح');
        return redirect()->back();
    }
}
