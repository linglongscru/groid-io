<?php

namespace Groid\Http\Controllers;

use Illuminate\Http\Request;

use Groid\Http\Requests;
use Groid\Plant;
use Groid\Transformers\PlantTransformer;

class PlantsController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $ops = Plant::paginate(8);
        return $this->response->paginator($ops, new PlantTransformer());
    }

}
