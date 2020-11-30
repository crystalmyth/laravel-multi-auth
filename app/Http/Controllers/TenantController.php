<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = User::where('role_id',2)->get();
        return view('tenants.index',compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenantRequest $request)
    {
        try {
            $user = User::create($request->validated() +  ['role_id' => 2, 'password' => 'secret']);
            $url = URL::signedRoute('invitation', $user);
            $user->notify(new TenantInviteNotification($url));
            return redirect()->route('tenants.index')->with('status','Tenant Added Successfully !!');
        } catch (\Throwable $th) {
            return redirect()->route('tenants.create');
        }
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
     * @param  User  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(User $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTenantRequest $request, User $tenant)
    {
        try {
            $tenant->update($request->validated());
            return redirect()->route('tenants.index')->with('status','Tenant Updated Successfully !!');
        } catch (\Throwable $th) {
            return redirect()->route('tenants.update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $tenant)
    {
        try {
            $tenant->delete();
            return redirect()->route('tenants.index')->with('status','Tenant Deleted Successfully !!');
        } catch (\Throwable $th) {
            return redirect()->route('tenants.index')->with('error','Some Error Occured, Try Again Later !!');
        }
    }

    public function invitation(User $user)
    {
        if(!request()->hasValidSignature() || $user->password != 'secret')
        {
            abort(401);
        }

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
