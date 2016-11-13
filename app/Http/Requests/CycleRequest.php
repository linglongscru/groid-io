<?php

namespace Groid\Api\Requests;

use Dingo\Api\Http\FormRequest;

class CycleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'op_id' => 'required|integer',
            'name' => 'string|max:120',
            'description' => 'string|max:4000',
            'start_date' => 'date',
            'end_date' => 'date',
            'medium' => 'string'
        ];
    }
}