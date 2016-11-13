<?php

namespace Groid\Http\Controllers;

use Groid\Data;
use Groid\Http\Requests;
use Groid\Api\Requests\DataRequest;
use Groid\Transformers\DataTransformer;
use Dingo\Api\Exception;

class DataController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $data = Data::paginate(10);
        return $this->response->paginator($data, new DataTransformer());
    }

    /**
     * @param DataRequest $request
     * @return Data
     */
    public function store(DataRequest $request)
    {
        return Data::create($request->only([
            'cycle_id',
            'air_temp_c',
            'co2_ppm',
            'relative_humidity',
            'water_temp_c',
            'water_level',
            'ec',
            'ph',
            'runoff_ec',
            'runoff_ph',
            'notes',
            'time_of_record',
        ]));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->item(Data::findOrFail($id), new DataTransformer);
    }

    public function update($id, DataRequest $request)
    {
        $data = Data::findOrFail($id);
        $data->update($request->only([
            'cycle_id',
            'air_temp_c',
            'co2_ppm',
            'relative_humidity',
            'water_temp_c',
            'water_level',
            'ec',
            'ph',
            'runoff_ec',
            'runoff_ph',
            'notes',
            'time_of_record',
        ]));
        return $data;
    }

    /**
     * @param $id
     * @return \Dingo\Api\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            Data::destroy($id);
            return $this->response()->accepted('', ["data" => ["Deleted."]]);
        } catch (\Exception $e) {
            return $this->response->noContent();
        }
    }
}