<?php

namespace Groid\Transformers;

use Groid\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(user $user)
    {
        return [
            'id' 	=> (int) $user->id,
            'name'  => $user->name,
            'email'	=> $user->email
        ];
    }
}