<?php

namespace Groid\Transformers;

use Groid\Stage;
use League\Fractal\TransformerAbstract;


class StageTransformer extends TransformerAbstract
{
    public function transform(Stage $stage)
    {
        return [
            'id' 	=> (int) $stage->id,
            'name'  => $stage->name,
            'description' => $stage->description
        ];
    }
}