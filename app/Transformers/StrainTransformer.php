<?php

namespace Groid\Transformers;

use Groid\Strain;
use League\Fractal\TransformerAbstract;


class StrainTransformer extends TransformerAbstract
{
    public function transform(Strain $strain)
    {
        return [
            'id'   => $strain->id,
            'name' 	=> (string) $strain->name,
            'image' => $strain->image,
            'lineage' => $strain->lineage,
            'url' => $strain->url,
            'cannabis_reports_link' => $strain->cannabis_reports_link,
            'ucpc' => $strain->ucpc,
            'seed_company' => $strain->seed_company,
            'genetics' => (int) $strain->genetics,
            'description'  => $strain->description,
            'from_seed' => $strain->from_seed,

        ];
    }
}