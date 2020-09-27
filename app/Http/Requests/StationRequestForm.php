<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StationRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules_post =  [
            'city' => 'required',
            'hour_start' => 'required',
            'hour_end' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ];

        $rules_update =  [
        ];

        $rules_delete =  [
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules_post;
            case 'PUT':
                return $rules_update;
            case 'DELETE':
                return $rules_delete;
        }
    }
}
