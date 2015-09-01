<?php

namespace App\Http\Controllers;

class CategoryController extends Controller {

// INDEX ACTORS
    public function getIndex() {

        return view('Pages/Category/index');
    }

// CREATE ACTORS
    public function getCreate() {
        return view('Pages/Category/create');
    }

// UPDATE ACTORS
    public function getUpdate($id) {
        return view('Pages/Category/update', ['id' => $id]);
    }

// DELETE ACTORS
    public function getDelete($id) {
        return view('Pages/Category/delete', ['id' => $id]);
    }

// READ ACTORS
    public function getRead($id) {
        return view('Pages/Category/read', ['id' => $id]);
    }

}