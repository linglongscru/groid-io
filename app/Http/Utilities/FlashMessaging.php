<?php
namespace Groid\Http\Utilities;

class FlashMessaging {
    public function flash($message, $level = 'info')
    {
        session()->flash('flash_message', $message);
        session()->flash('message_level', $level);
    }
}