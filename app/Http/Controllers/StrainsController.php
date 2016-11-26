<?php

namespace Groid\Http\Controllers;

use Groid\Strain;
use Groid\Transformers\StrainTransformer;

class StrainsController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $strains = Strain::paginate(1110);
        return $this->response->paginator($strains, new StrainTransformer());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $strain = Strain::findOrFail($id);
            return $this->item($strain, new StrainTransformer);
        } catch (\Exception $e) {
            return $this->response->errorNotFound();
        }

    }
}
