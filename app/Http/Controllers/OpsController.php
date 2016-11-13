<?php

namespace Groid\Http\Controllers;

use Groid\Op;
use Groid\Transformers\OpTransformer;

class OpsController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
            $ops = Op::paginate(10);
            return $this->response->paginator($ops, new OpTransformer());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $op = Op::findOrFail($id);
        return $this->response->array($op);
    }

}
