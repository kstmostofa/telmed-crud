<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    //Login view function
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required:min:8'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Toastr::success('Login Successfully! Redirecting....', 'Success');
            if (auth()->user()->role === "admin") {
                return redirect()->route('admin.dashboard');
            }

            if (auth()->user()->role === "agent") {
                return redirect()->route('agent.dashboard');
            }

            if (auth()->user()->role === "doctor") {
                return redirect()->route('doctor.dashboard');
            }
        }
        Toastr::error('Invalid Credentials', 'Error', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
        // return response()->json([
        //     'message' => 'The provided credentials do not match our records.',
        //     'success' => false
        // ]);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect('login');
    }
}
