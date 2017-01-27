<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use App\SocialProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'isAdmin' => false,
        ]);
      
    }

        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            return redirect('/');
        }

        
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();

        if(!$socialProvider)
        {
          

              $user = User::firstOrCreate(
                    ['email' => $socialUser->getEmail()],
                    ['username' => trim($socialUser->getName())],
                    ['name' => $socialUser->getName()]
                );

              if(!$user->photo_path)
              {
                    $user->photo_path = $socialUser->getAvatar();
                    $user->save();
              }
           

               
              $user->socialProviders()->create(
                    ['provider_id' => $socialUser->getId(), 'provider' => $provider]
              );
        }
        else
        {

            $user = $socialProvider->user;
           
        }

        auth()->login($user);

        return redirect('/');

    }
}
