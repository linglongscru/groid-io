<?php

namespace Groid\Transformers;

use Groid\Plant;
use League\Fractal\TransformerAbstract;


class PlantTransformer extends TransformerAbstract
{
    public function transform(Plant $plant)
    {
        return [
            'user_id' 	=> (int) $plant->user_id,
            'cycle_id' => (int) $plant->cycle_id,
            'strain_id' => (int) $plant->strain_id,
            'name'  => $plant->source,
            'description' => $plant->from_seed,
        ];
    }
}