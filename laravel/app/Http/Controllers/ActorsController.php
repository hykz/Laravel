<?php

namespace App\Http\Controllers;

class ActorsController extends Controller {

// INDEX ACTORS
    public function index() {
        $datas = [
            'acteurs' => [
              ['nom' => 'Boyer', 'prenom' => 'Julien', 'age' => 27],
              ['nom' => 'Cyka', 'prenom' => 'Riri', 'age' => 18],
              ['nom' => 'Suka', 'prenom' => 'Fifi', 'age' => 35],
              ['nom' => 'Blat', 'prenom' => 'Loulou', 'age' => 43]
            ],
            'title' => 'Liste des Acteurs',
            'noms' => ['Julien','Matthieu','Aurelien','Thais','Marjorie','Daniel'],
            'ages' => [18,23,35,45,65],
            'localite' =>
            ['Paris' => ['Jessy','Marjo','Daniel'],
            'Lyon' => ['Thais','Julien','Matthieu']
            ]
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