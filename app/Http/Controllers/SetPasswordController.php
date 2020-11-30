<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetPasswordController extends Controller
{
    public function create()
    {
        return view('auth.set-password');
    }

    public function store(StorePasswordRequest $request)
    {
        Auth::user()->update([
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route('dashboard')->with('status','Password Set Successfully !!');
    }
}
