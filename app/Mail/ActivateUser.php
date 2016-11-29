<?php

namespace Groid\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivateUser extends Mailable
{
    use Queueable, SerializesModels;

    private $code ='';

    /**
     * ActivateUser constructor.
     * @param $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * @param $code
     * @return $this
     */
    public function build($code)
    {
        return $this->from('support@groid.io')
            ->subject('Please activate your account.')
            ->view('emails.activate_account')
            ->with('code', $code);
    }
}
