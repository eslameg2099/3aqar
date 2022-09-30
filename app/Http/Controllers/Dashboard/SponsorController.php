<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequsetSponsor;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class SponsorController extends Controller
{
   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsors = RequsetSponsor::orderBy('id', 'DESC')->filter()->paginate();
        return view('dashboard.sponsor.index', compact('RequsetSponsors'));
        //
    }


    public function type($type)
    {
        $RequsetSponsors = RequsetSponsor::where('stauts',$type)->filter()->paginate();
        return view('dashboard.sponsor.index', compact('RequsetSponsors'));
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
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsor = RequsetSponsor::findorfail($id);
        return view('dashboard.sponsor.show', compact('RequsetSponsor'));
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
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsor = RequsetSponsor::findorfail($id);
        return view('dashboard.sponsor.edit', compact('RequsetSponsor'));

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
        $RequsetSponsor = RequsetSponsor::findorfail($id);
        $RequsetSponsor->sponser_at = $request->date;
        $RequsetSponsor->save();
        $RequsetSponsor->addAllMediaFromTokens();
        flash()->success('تم بنجاح');
        return redirect()->route('dashboard.sponsors.index');

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
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsor = RequsetSponsor::findorfail($id);
        $RequsetSponsor->delete();
        flash()->success(trans('sponsor.messages.deleted'));
        return redirect()->back();



        //
    }


    public function active($id)
    {
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsor = RequsetSponsor::findorfail($id);
        $RequsetSponsor->active = '1';
        $RequsetSponsor->stauts = 'current';
        $RequsetSponsor->save();
        flash()->success('تم بنجاح');
        return redirect()->back();
    }


    public function disactive($id)
    {
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsor = RequsetSponsor::findorfail($id);
        $RequsetSponsor->active = '0';
        $RequsetSponsor->stauts = 'cancel';
        $RequsetSponsor->save();
        flash()->success('تم بنجاح');
        return redirect()->back();


    }


    public function accept($id)
    {
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsor = RequsetSponsor::findorfail($id);
        $RequsetSponsor->stauts = 'current';
        $RequsetSponsor->active = '1';
        $RequsetSponsor->save();
        flash()->success('تم بنجاح');
        return redirect()->back();
    }


    public function disaccept($id)
    {
        $this->authorize('viewAny', Estate::class);

        $RequsetSponsor = RequsetSponsor::findorfail($id);
        $RequsetSponsor->stauts = 'cancel';
        $RequsetSponsor->active = '0';
        $RequsetSponsor->save();
        flash()->success('تم بنجاح');
        return redirect()->back();

    }



}
