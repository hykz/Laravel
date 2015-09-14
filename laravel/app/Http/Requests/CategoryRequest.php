<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "title" => "required|min:3",
            "slug" => "required|min:3",
            "image" => "required|image",
            "description" => "required|min:10",

        ];
    }

    public function messages() {
        return [
            "required" => "Le champ est obligatoire"
        ];


    }
}