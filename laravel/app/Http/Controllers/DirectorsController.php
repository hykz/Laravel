<?php

namespace App\Http\Controllers;
use App\Model\Directors as directorsdb;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class DirectorsController extends Controller {


// INDEX ACTORS
    public function index() {

        $datas = [
            "directors" => directorsdb::All()
        ];

        return view('Pages/Directors/index', $datas);
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
        $director = directorsdb::find($id);
        $director->delete();

        Session::flash('success', "Le directeur {$director->firstname} {$director->lastname} a bien été supprimé.");

        return Redirect::route('directors.index');
    }

// READ DIRECTORS
    public function read($id = null){
        $datas = [
            'directors' => directorsdb::find($id) /*trouver un acteur par son id*/
        ];
        return view('Pages/Directors/read', $datas);
    }

}

