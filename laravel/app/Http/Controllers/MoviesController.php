<?php

namespace App\Http\Controllers;

class MoviesController extends Controller {

// INDEX ACTORS
    public function index() {
        return view('Pages/Movies/index');

    }

// CREATE DIRECTORS
    public function create() {
        return view('Pages/Movies/create');
    }

// UPDATE DIRECTORS
    public function update($id) {
        return view('Pages/Movies/update', ['id' => $id]);
    }

// DELETE DIRECTORS
    public function delete($id) {
        return view('Pages/Movies/delete', ['id' => $id]);
    }

// READ DIRECTORS
    public function read($id) {
        return view('Pages/Movies/read', ['id' => $id]);
    }

// SEARCH FUNCTION
    public function search($lan = 'FR',$vis = 1, $test = 3) {
        return view('Pages/Movies/search',
            ['lan' => $lan,
            'vis' => $vis,
            'test' => $test]
        );
    }

}

