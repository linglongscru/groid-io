<?php

namespace Groid\Transformers;

use Groid\Cycle;
use Groid\Op;
use League\Fractal\TransformerAbstract;

class CycleTransformer extends TransformerAbstract
{
    public function transform(Cycle $cycle)
    {

        $ou = Op::all()->where('id', $cycle->op_id);
        return [
            'name'  => $cycle->name,
            'description'	=> $cycle->description,
            'start_date' => $cycle->start_date,
            'end_date' => $cycle->end_date,
            'medium' => $cycle->medium,
            'op' 	=> $ou->pluck('unit_name'),
        ];
    }
}