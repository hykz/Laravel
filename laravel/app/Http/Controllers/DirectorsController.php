<?php

namespace App\Http\Controllers;

class DirectorsController extends Controller {


// INDEX ACTORS
    public function index($ville = 'Strasbourg') {
        dump($ville);
        return view('Pages/Directors/index');
    }

// CREATE DIRECTORS
    public function create() {
        return view('Pages/Directors/create');
    }

// UPDATE DIRECTORS
    public function update($id) {
        return view('Pages/Directors/update', ['id' => $id]);
    }

// DELETE DIRECTORS
    public function delete($id) {
        return view('Pages/Directors/delete', ['id' => $id]);
    }

// READ DIRECTORS
    public function read($id) {
        return view('Pages/Directors/read', ['id' => $id]);
    }

}

