<?php

namespace Groid\Api\Requests;

use Dingo\Api\Http\FormRequest;

class JournalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'body' => 'required|string|max:4000'
        ];
    }
}