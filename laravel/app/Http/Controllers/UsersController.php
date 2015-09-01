<?php

namespace App\Http\Controllers;

class UsersController extends Controller {

// INDEX ACTORS
    public function index() {
        return view('Pages/Users/index');
    }


// SEARCH FUNCTION
    public function search($zipcode = '69000',$enable = 0, $city = "Lyon") {
        return view('Pages/Users/search',
            ['zipcode' => $zipcode,
                'enable' => $enable,
                'city' => $city]
        );
    }
    public function create() {
        return view('Pages/Users/create');
    }
}

