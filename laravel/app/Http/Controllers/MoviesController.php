<?php

namespace App\Http\Controllers;

class MoviesController extends Controller {

// INDEX ACTORS
    public function index() {

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

}

