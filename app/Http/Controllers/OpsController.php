<?php

namespace Groid\Http\Controllers;

use Groid\Op;
use Illuminate\Contracts\Auth\Guard;
use Groid\Transformers\OpTransformer;

class OpsController extends ApiController
{
    /**
     * @param Guard $guard
     * @return \Dingo\Api\Http\Response
     */
    public function index(Guard $guard)
    {
        $user = $guard->user()->id;
        $myOps = Op::whereUserId($user);
        $ops = $myOps->paginate(10);
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
