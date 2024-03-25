<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SigninRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'=>'required|email|max:255',
            'password'=> 'required|min:5|max:255|string'
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
