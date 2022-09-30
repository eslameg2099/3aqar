<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\City;
use App\Http\Requests\Dashboard\AdvisorRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advisor;

class AdvisorController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * CityController constructor.
     */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Advisor::class);

        $advisors = Advisor::filter()->paginate();
        return view('dashboard.advisor.index', compact('advisors'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', Advisor::class);

        $cities = City::whereNotIn('id', Advisor::get()->pluck('city_id'))->get();
        return view('dashboard.advisor.create', compact('cities'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvisorRequest $request)
    {
        $Advisor = Advisor::create($request->all());
        flash()->success(trans('advisors.messages.created'));
        return redirect()->route('dashboard.advisor.show', $Advisor);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advisor $advisor)
    { 
        $this->authorize('viewAny', Advisor::class);

        return view('dashboard.advisor.show', compact('advisor'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advisor $advisor)
    {
        $this->authorize('viewAny', Advisor::class);

        return view('dashboard.advisor.edit', compact('advisor'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advisor $advisor)
    {
        $advisor->update($request->except('_token','_method'));
        flash()->success(trans('advisors.messages.updated'));
        return redirect()->route('dashboard.advisor.show', $advisor);

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advisor $advisor)
    {
        $this->authorize('viewAny', Advisor::class);

        $advisor->delete();

        flash()->success(trans('advisors.messages.deleted'));

        return redirect()->route('dashboard.advisor.index');
        //
    }
}
