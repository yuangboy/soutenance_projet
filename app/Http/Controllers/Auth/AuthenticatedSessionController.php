<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('frontend.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $url = '';

        $request->session()->regenerate();

        if($request->user()->role ==='admin'){
            $url = 'frontad';
        }elseif($request->user()->role ==='praticien'){
            $url = 'praticien/frenteprati';
        }
        else{
            $url = 'patient/dashboard';
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request){

        //recherche l'user
        $user=User::where("email",$request->email)->first();



        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['result' => False, ],401);
        }
         return response()->json(['result' => True, ],200);
    }
}
