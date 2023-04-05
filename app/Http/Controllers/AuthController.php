<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Alert;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function authenticate(Request $request)
    {
        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            toast('Berhasil Login', 'success');
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed');
    }


    public function default()
    {

        return view('components.layout');
    }

    public function loginview()
    {

        return view('auth.login');
    }

    public function registerview()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3',

        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);


        // dd($request);
        User::create($validatedData);
        toast('Akun Anda Telah terdaftar', 'success');
        return redirect('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toast('Akun Anda Telah Berhasil Logout', 'success');
        return redirect('/');
    }
}
