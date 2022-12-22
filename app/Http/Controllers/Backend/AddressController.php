<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = '/users/{}/addresses';
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return View
     */
    public function index(User $user): View
    {

        $addrs = $user->addrs;
        return view('backend.addresses.index', ["addrs" => $addrs, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function create(User $user): View|Factory|Application
    {
        return view("backend.addresses.insert_form", compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddressRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function store(AddressRequest $request, User $user): RedirectResponse
    {
        $addr = new Address();
        $data = $this->prepare($request, $addr->getFillable());
        $addr->fill($data);
        $addr->save();

        $this->editReturnUrl($user->user_id);
        return redirect($this->returnUrl);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Address $address
     * @return Application|Factory|View
     */
    public function edit(User $user, Address $address): View|Factory|Application
    {
        return view('backend.addresses.update_form', ["user" => $user, "addr" => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AddressRequest $request
     * @param User $user
     * @param Address $address
     * @return Application|Redirector|RedirectResponse
     */
    public function update(AddressRequest $request, User $user, Address $address): Redirector|RedirectResponse|Application
    {
        $data = $this->prepare($request, $address->getFillable());
        $address->fill($data);
        $address->save();

        $this->editReturnUrl($user->user_id);
        return redirect($this->returnUrl);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(User $user, Address $address): Redirector|RedirectResponse|Application
    {
        $address->forceDelete();
        return redirect()->back();
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/users/$id/addresses";
    }
}
