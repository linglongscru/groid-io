<?php

namespace Groid\Http\Controllers;

use Groid\User;
use Groid\Api\Requests\UserRequest;

/**
 * @Resource("users", uri="/users")
 */
class UsersController extends ApiController
{
    /**
     * @param UserRequest $request
     * @return User
     */
    public function store(UserRequest $request)
    {
//        return User::create($request->only(['name', 'email']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UserRequest $request, $id)
    {
//        $user = User::findOrFail($id);
//        $user->update($request->only(['name', 'email']));
//
//        return $user;
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
//        return User::destroy($id);
    }
}