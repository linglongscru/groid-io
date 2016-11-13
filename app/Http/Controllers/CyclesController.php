<?php
namespace Groid\Http\Controllers;

use Groid\Cycle;
use Groid\Api\Requests\CycleRequest;
use Illuminate\Contracts\Auth\Guard;
use Groid\Transformers\CycleTransformer;


class CyclesController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function index(Guard $guard)
    {
        $user = $guard->user()->id;
        $myCycles = Cycle::whereUserId($user);
        $cycles = $myCycles->paginate(8);
        return $this->response->paginator($cycles, new CycleTransformer());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->item(Cycle::findOrFail($id), new CycleTransformer);
    }

    /**
     * @param CycleRequest $request
     * @return Cycle
     */
    public function store(CycleRequest $request)
    {
        return Cycle::create($request->only([
            'user_id',
            'op_id',
            'name',
            'description',
            'start_date',
            'end_date',
            'medium'
        ]));
    }

    /**
     * @param $id
     * @param CycleRequest $request
     * @return mixed
     */
    public function update($id, CycleRequest $request)
    {
        return Cycle::store($id, $request->only([]));
    }
}
