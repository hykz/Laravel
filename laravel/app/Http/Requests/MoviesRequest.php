<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [

            "image" => "required|image",

        ];
    }

    public function messages() {
        return [
            "required" => "Le champ est obligatoire"
        ];


    }
}