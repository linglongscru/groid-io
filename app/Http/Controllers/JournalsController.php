<?php

namespace Groid\Http\Controllers;

use Groid\Journal;
use Groid\Api\Requests\JournalRequest;
use Groid\Transformers\JournalTransformer;
use Dingo\Api\Exception;

class JournalsController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $journals = Journal::paginate(15);
        return $this->response->paginator($journals, new JournalTransformer());
    }

    /**
     * @param JournalRequest $request
     * @return Journal
     */
    public function store(JournalRequest $request)
    {
        return Journal::create($request->only(['user_id', 'title', 'body']));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $journal = Journal::findOrFail($id);
            return $this->item($journal, new JournalTransformer);
        } catch (\Exception $e) {
                return $this->response->errorNotFound();
            }

    }

    /**
     * @param $id
     * @param JournalRequest $request
     * @return mixed
     */
    public function update($id, JournalRequest $request)
    {
        try {
            $journal = Journal::findOrFail($id);
            $journal->update($request->only(['title', 'body']));
            return $journal;

        } catch (\Exception $e) {
            return $this->response->errorNotFound();
        }
    }


    /**
     * @param $id
     * @return \Dingo\Api\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            Journal::destroy($id);
            return $this->response()->accepted('', ["data" => ["Deleted."]]);
        } catch (\Exception $e) {
            return $this->response->noContent();
        }
    }
}