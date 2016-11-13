<?php

namespace Groid\Api\Requests;

use Dingo\Api\Http\FormRequest;

class DataRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cycle_id' => 'required|integer',
            'air_temp_c' => 'integer|min:0|max:100',
            'co2_ppm' => 'integer',
            'relative_humidity' => 'integer|min:0|max:100',
            'water_temp_c' => 'integer|min:0|max:100',
            'water_level' => 'integer|min:0|max:100',
            'ec' => 'numeric|min:0.1|max:4.0',
            'ph' => 'numeric|min:1.0|max:14.0',
            'runoff_ec' => 'numeric|min:0.1|max:4.0',
            'runoff_ph' => 'numeric|min:1.0|max:14.0',
            'notes' => 'string|max:4000',
            'time_of_record' => 'required|date-format:Y-m-d H:i:s',
        ];
    }
}