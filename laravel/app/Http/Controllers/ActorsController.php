<?php

namespace App\Http\Controllers;

use App\Model\Actors as coucou;

class ActorsController extends Controller {

// INDEX ACTORS
    public function index() {

        $datas = [
           "actors" => coucou::All()
        ];

        return view('Pages/Actors/index', $datas);
    }

// CREATE ACTORS
    public function create() {
        return view('Pages/Actors/create');
    }

// UPDATE ACTORS
    public function update($id) {
        return view('Pages/Actors/update', ['id' => $id]);
    }

// DELETE ACTORS
    public function delete($id) {
        return view('Pages/Actors/delete', ['id' => $id]);
    }

// READ ACTORS
    public function read($id) {
        return view('Pages/Actors/read', ['id' => $id]);
    }

}