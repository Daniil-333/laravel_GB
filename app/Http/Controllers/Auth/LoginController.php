<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginSoc($soc)
    {
        if(Auth::check()) {
            return redirect()->route('home');
        }
        switch ($soc) {
            case 'vk':
                return Socialite::driver('vkontakte')->redirect();
            case 'github':
                return Socialite::driver('github')->redirect();
        }
    }

    public function reponseSoc(UserRepository $userRepository, $soc)
    {
        if(!Auth::check()) {
            $user = '';
            switch ($soc) {
                case 'vk':
                    $user = Socialite::driver('vkontakte')->user();break;
                case 'github':
                    $user = Socialite::driver('github')->user();break;
            }

            try {
                $userValid = $userRepository->getUserBySocID($user, $soc);
                Auth::login($userValid);
            }catch (\Exception $e) {
                return redirect()->route('login')->withErrors( 'Пользователь с таким e-mail уже существует!');
            }

        }

        return redirect()->route('home');
    }
}
