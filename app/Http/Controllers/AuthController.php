<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

        if(Auth::attempt($login)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed');

    }

    // public function login(Request $request)
    // {
    //     $validator = Validator::make($request->all(),[
    //         'email' => 'required|string|email',
    //         'password' => 'required|string|min:6',
    //     ]);
    //     if ($validator->fails()){
    //         return back()->with('LoginError', 'Login Failed');
    //     }
    //     if(!$token=auth()->attempt($validator->validated())){
    //         return back()->with('LoginError', 'Login Failed');
    //     }
    //     return redirect()->intended('/dashboard');
    //     return $this->createNewToken($token);
    // }

    // public function createNewToken($token){
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth()->Factory()->getTTL()*60,
    //         'user' => auth()->user()
    //     ]);
    // }

    // // return view('auth.login');
    // public function register(Request $request){
    //     $validator = Validator::make($request->all(),[
    //         'name' => 'required',
    //         'email' => 'required|string|email',
    //         'password' => 'required|string|min:6',
    //     ]);
    //     if ($validator->fails()){
    //         return response()->json($validator->errors()->toJson(),400);
    //     }
    //     $user = User::create(array_merge(
    //         $validator->validated(),
    //         ['password' => bcrypt($request->password)]
    //     ));
    //     return response()->json([
    //         'message'=> 'User Successfuly registered',
    //         'user'=> $user
    //     ],201);

    // }

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
        toast('Akun Anda Telah terdaftar','success');
        return redirect('/');
       
    }
}
