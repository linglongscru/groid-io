<?php

namespace Groid\Http\Controllers\Auth;

use Groid\User;
use Groid\Http\Controllers\Controller;
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * @param $code
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activateAccount($code, Message $message)
    {
        if ($user = User::where('activation_token', '=', $code)->first()) {
            $user->active = true;
            $user->activation_token = null;
            $user->save();
            if ($user->save()) {
                \Auth::login($user);
                $message->flash(\Lang::get('auth.successActivated'), 'success');
                session()->flash('create_a_profile', 'Please take a moment to add a little detail to your profile.');
            }

            return view('user.profile');
        }

        if (\Auth::user() && \Auth::user()->active == true) {
            \Auth::user()->activation_token = null;
            \Auth::user()->save();
            $message->flash('Your account is already active. let\'s grow something!', 'warning');
            return view('user.profile');
        }

        $message->flash('Sorry, friend, that is not a valid link. '.\Lang::get('auth.pleaseActivate'), 'warning');
        return view('auth.login');
    }

    /**
     * @param User $user
     */
    public function sendEmail(User $user)
    {
        $data = array(
            'email' => $user->email,
            'code' => $user->activation_token,
        );
        mail($data[ 'email' ], 'emails.activate_account', \Lang::get('auth.pleaseActivate'));
    }

    /**
     * @return $this
     */
    public function resendEmail()
    {
        $user = \Auth::user();
        if ($user->resent >= 3) {
            return view('auth.tooManyEmails')
                ->with('email', $user->email);
        } else {
            $user->resent = $user->resent + 1;
            $user->save();
            $this->sendEmail($user);

            return view('auth.activateAccount')
                ->with('email', $user->email);
        }
    }
}
