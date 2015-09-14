<?php

namespace App\Http\Controllers;
use App\Http\Requests\DirectorsRequest;
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


    // UPDATE ACTORS
    public function post(DirectorsRequest $request) {
        $director = new directorsdb();
        $director->firstname = $request->firstname;
        $director->lastname = $request->lastname;
        $director->dob = $request->dob;
        $director->biography = $request->biography;

        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $destinationPath = public_path() . '/uploads/director/';
            $file->move($destinationPath, $filename);
        }

        $director->image = asset('uploads/director/'.$filename);


        $director->save();

        Session::flash('success', "L'acteur {$director->firstname} {$director->lastname} est injecté dans la BDD.");

        return Redirect::route('directors.index');
    }

}

