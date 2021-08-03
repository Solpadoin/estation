<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StationRequestForm extends FormRequest
{
    const RULES = [

    ];
    
    const RULES_POST = [
        'city'          => 'required',
        'hour_start'    => 'required',
        'hour_end'      => 'required',
        'latitude'      => 'required',
        'longitude'     => 'required'
    ];

    const RULES_PUT = [

    ];

    const RULES_DELETE = [

    ];

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
        switch ($this->getMethod())
        {
            case 'POST':
                return self::RULES_POST;
            case 'PUT':
                return self::RULES_PUT;
            case 'DELETE':
                return self::RULES_DELETE;
            default:
                return self::RULES;
        }
    }
}
