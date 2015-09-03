<?php

namespace App\Http\Controllers;

class CinemaController extends Controller {

// INDEX ACTORS
    public function getIndex() {

        return view('Pages/Cinema/index');
    }

// CREATE ACTORS
    public function getCreate() {
        return view('Pages/Cinema/create');
    }

// UPDATE ACTORS
    public function getUpdate($id) {
        return view('Pages/Cinema/update', ['id' => $id]);
    }

// DELETE ACTORS
    public function getDelete($id) {
        return view('Pages/Cinema/delete', ['id' => $id]);
    }

// READ ACTORS
    public function getRead($id) {
        return view('Pages/Cinema/read', ['id' => $id]);
    }

}