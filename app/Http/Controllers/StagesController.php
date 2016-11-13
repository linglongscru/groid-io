<?php

namespace Groid\Http\Controllers;

use Groid\Stage;
use Groid\Transformers\StageTransformer;

class StagesController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $ops = Stage::paginate(8);
        return $this->response->paginator($ops, new StageTransformer());
    }

}
