<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'=> 'required|min:3|string',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:5|string',
            'state_id'=> 'required|exists:states,id',
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json(
            [
                'error'=> $validator,
            ]
        ));
    }
}
