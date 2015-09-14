<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class DirectorsRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "firstname" => "required|min:3",
            "lastname" => "required|min:3",
            "image" => "required|image",
            "biography" => "required|min:10",

        ];
    }

    public function messages() {
        return [
            "required" => "Le champ est obligatoire"
        ];


    }
}