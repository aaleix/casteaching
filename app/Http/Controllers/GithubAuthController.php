<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Tests\Feature\GithubAuthControllerTest;

class GithubAuthController extends Controller
{
    public static function testedBy()
    {
        return GithubAuthControllerTest::class;
    }

    public function redirect() {
        return Socialite::driver('github')->scopes(['user:email'])->redirect();
    }

    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            Log::error('GitHub Login Error: ', ['error' => $e]);
            return redirect('/login')->withErrors(['msg' => 'An error occurred while logging in with GitHub! ' . $e->getMessage()]);
        }

        // Aquí puedes manejar la lógica de autenticación e inicio de sesión
        // Ejemplo:
        Auth::login(User::createUserFromGithub($githubUser));

        return redirect('/dashboard');
    }
}