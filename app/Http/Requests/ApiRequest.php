<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new ApiException(201, 'Ошибка валидации данных', $validator->errors());
    }

    public function messages()
    {
        return [
            'login.required' => 'Заполните поле логин',
            'password.required' => 'Заполните поле пароль',
            'name.required' => 'Заполните поле name',
            'name.max' => 'Поле превысило допустимый размер',
            'price.required' => 'Заполните поле price',
            'email.email' => 'Поле не соответствует типу email',
        ];
    }
}
