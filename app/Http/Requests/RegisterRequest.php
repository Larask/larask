<?php

namespace Larask\Http\Requests;

/**
 * Class RegisterRequest
 * @package Larask\Http\Requests
 */
class RegisterRequest extends Request
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
        return [
            'email'      => 'required|email',
            'first_name' => 'required|between:3,100',
        ];
    }
}
