<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

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
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();
        $customClaims = [
            'sub' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
        ];
        $token = JWTAuth::claims($customClaims)->fromUser($user);
        $cookie = cookie('jwt_token',  $token, 60);

        return redirect()->intended(route('dashboard', absolute: false))->cookie($cookie);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $token = $request->cookie('jwt_token');
        if ($token) {
            try {
            JWTAuth::setToken($token)->invalidate();
            } catch (TokenExpiredException $e) {
            } catch (JWTException $e) {
            }
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $cookie = cookie('jwt_token', '', -1);
        return redirect('/')->withCookie($cookie);
    }
}
