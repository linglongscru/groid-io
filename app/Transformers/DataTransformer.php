<?php

namespace Groid\Transformers;

use Groid\Data;
use League\Fractal\TransformerAbstract;


class DataTransformer extends TransformerAbstract
{
    /**
     * @param Data $data
     * @return array
     */
    public function transform(Data $data)
    {
        return [
            'cycle_id' 	=> (string) $data->cycle_id,
            'air_temp' => $data->air_temp_c,
            'co2' => (int) $data->co2_ppm,
            'rh'  => (int) $data->relative_humidity,
            'water_temp' => (int) $data->water_temp_c,
            'water_level' => (int) $data->water_level,
            'ec' => (int) $data->ec,
            'ph' => (int) $data->ph,
            'runoff_ec' => (int) $data->runoff_ec,
            'runoff_ph' => (int) $data->runoff_ph,
            'notes' => (string) $data->notes,
            'time_of_record' => (string) $data->time_of_record,
        ];
    }
}