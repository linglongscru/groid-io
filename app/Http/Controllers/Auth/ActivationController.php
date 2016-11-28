<?php

namespace Groid\Http\Controllers\Auth;

use Groid\User;
use Groid\Http\Utilities\FlashMessaging as Message;

class ActivationController extends Controller
{

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
            return view('/home');
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