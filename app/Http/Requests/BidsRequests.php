<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidsRequests extends FormRequest
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
            'name'                  => 'required',
            'phone'                 => 'required',
            'email'                 => 'required|email',
            'spec'                  => 'required|integer',
            'title'                  => 'required',
            'desc'                  => 'required',
            'g-recaptcha-response'  => 'required|recaptcha'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'Требуется ввести имя!',
            'phone.required'        => 'Введите номер телефона!',
            'email.required'        => 'Введите email!',
            'email.email'           => 'Введите правильный формат email!',
            'title.required'        => 'Напишите название!',
            'spec.required'         => 'Выберите специализацию!',
            'spec.integer'          => 'Введите одну из специальностей',
            'desc.required'         => 'Напишите подробнее о цели работы!',
            'g-recaptcha-response'  => 'Заполните Google-captcha!'
        ];
    }
}
