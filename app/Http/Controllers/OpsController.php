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
        $ops = Op::whereUserId($user)->get();
        return $this->response()->collection($ops, new OpTransformer() );
    }

    /**
     * @param Guard $guard
     * @param $id
     */
    public function show(Guard $guard, $id)
    {

        $op = Op::findOrFail($id);
        if ($guard->id() == $op->user_id) {
            return $this->response->array($op);
        }
        return $this->response()->errorNotFound();
    }

}
