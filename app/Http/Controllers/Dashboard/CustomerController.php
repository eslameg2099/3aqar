<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\City;

use App\Models\Customer;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\CustomerRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * CustomerController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Customer::class, 'customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::filter()->paginate();

        return view('dashboard.accounts.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::withTrashed()->get();

        return view('dashboard.accounts.customers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->allWithHashedPassword());

        $customer->setType($request->type);

        $customer->addAllMediaFromTokens();

        flash()->success(trans('customers.messages.created'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('dashboard.accounts.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $cities = City::withTrashed()->get();
        return view('dashboard.accounts.customers.edit', compact('customer','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->allWithHashedPassword());

        $customer->setType($request->type);

        $customer->addAllMediaFromTokens();

        flash()->success(trans('customers.messages.updated'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        flash()->success(trans('customers.messages.deleted'));

        return redirect()->route('dashboard.customers.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Customer::class);

        $customers = Customer::onlyTrashed()->paginate();

        return view('dashboard.accounts.customers.trashed', compact('customers'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Customer $customer)
    {
        $this->authorize('viewTrash', $customer);

        return view('dashboard.accounts.customers.show', compact('customer'));
    }

    /**
     * Restore the trashed resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Customer $customer)
    {
        $this->authorize('restore', $customer);

        $customer->restore();

        flash()->success(trans('customers.messages.restored'));

        return redirect()->route('dashboard.customers.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Customer $customer)
    {
      //  $this->authorize('forceDelete', $customer);

        $customer->forceDelete();

        flash()->success(trans('customers.messages.deleted'));

        return redirect()->route('dashboard.customers.trashed');
    }

    public function active($id)
    {
        $Customer = Customer::findorfail($id);
        $Customer->phone_verified_at =now();;
        $Customer->save();
        flash()->success('تم بنجاح');
        return redirect()->back();
    }


    public function disactive($id)
    {
        $Customer = Customer::findorfail($id);
        $Customer->phone_verified_at =null;
        $Customer->save();
        flash()->success('تم بنجاح');
        return redirect()->back();


    }
}
