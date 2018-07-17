<?php

namespace App\Validators;

use GuzzleHttp\Client;

class ReCaptcha
{

    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     */
    public function validate(
        $attribute,
        $value,
        $parameters,
        $validator
    ){
        $client = new Client();

        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>env('GOOGLE_RECAPTCHA_SECRET'),
                    'response'=>$value,
                    'remoteip'=>$_SERVER['REMOTE_ADDR'],
                ]
            ]
        );

        $body = json_decode((string)$response->getBody());
        return $body->success;
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'ReCaptcha required!',
        ];
    }
}