<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->first();
    
        if ($user && $user->banned) {
            Auth::logout();
            return redirect()->route('login')->with('error', "Votre compte est actuellement suspendu en raison d'une violation des politiques.");
        }
    
        $request->authenticate();
    
        $request->session()->regenerate();
        $user = $request->user();
    
        if ($user->role === 'utilisateur') {
            return redirect(RouteServiceProvider::HOME);
        } elseif ($user->role === 'organisateur') {
            return redirect()->route('organisateur.dashboard');
        } elseif ($user->role === 'administrateur') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
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
}
