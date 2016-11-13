<?php

namespace Groid\Transformers;

use Groid\Op;
use League\Fractal\TransformerAbstract;


class OpTransformer extends TransformerAbstract
{
    /**
     * @param Op $op
     * @return array
     */
    public function transform(Op $op)
    {
        return [
            'id' 	=> (int) $op->id,
            'name'  => $op->unit_name,
            'street_address' => $op->street_address,
            'user_id' => $op->user_id
        ];
    }
}