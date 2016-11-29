<?php

namespace Groid\Http\Controllers\Auth;

use Groid\Http\Controllers\Controller as Controller;
use Groid\Mail\ActivateUser;
use Groid\User;
use Groid\Http\Utilities\FlashMessaging as Message;
use Illuminate\Support\Facades\Mail;

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
            }
            return view('/home');
        }

        if (\Auth::user() && \Auth::user()->active == true) {
            \Auth::user()->activation_token = null;
            \Auth::user()->save();
            $message->flash('Your account is already active. let\'s grow something!', 'warning');
            return view('home');
        }

        $message->flash('Sorry, friend, that is not a valid link. '.\Lang::get('auth.pleaseActivate'), 'warning');
        return redirect('home');
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
        return Mail::to($data[ 'email' ])->send(new ActivateUser($data[ 'code' ]));
    }

    /**
     * @return $this
     */
    public function resendEmail(Message $message)
    {
        $user = \Auth::user();
        if ($user->resent >= 3) {
            $flashMessage = $message->flash(\Lang::get('auth.tooManyEmails'), 'danger');
            return view('auth.activate_account')->with('email', $user->email, $flashMessage);
        } else {
            $user->resent = $user->resent + 1;
            $user->save();
            $this->sendEmail($user);

            return view('auth.activate_account')
                ->with('email', $user->email);
        }
    }
}