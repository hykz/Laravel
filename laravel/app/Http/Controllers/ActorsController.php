<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorsRequest;
use App\Http\Requests\Request;
use App\Model\Actors as actorsdb;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ActorsController extends Controller {

// INDEX ACTORS
    public function index() {

        $datas = [
           "actors" => actorsdb::All()
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
        $actor = actorsdb::find($id);
        $actor->delete();

        Session::flash('success', "L'acteur {$actor->firstname} {$actor->lastname} a bien été supprimé.");
        
        return Redirect::route('actors.index');
    }

// READ ACTORS
    public function read($id = null){
        $datas = [
            'actor' => actorsdb::find($id) /*trouver un acteur par son id*/
        ];
        return view('Pages/Actors/read', $datas);
    }

    // UPDATE ACTORS
    public function post(ActorsRequest $request) {
        $actor = new actorsdb();
        $actor->firstname = $request->firstname;
        $actor->lastname = $request->lastname;
        $actor->dob = $request->dob;
        $actor->nationality = $request->nationality;
        $actor->roles = $request->roles;
        $actor->recompenses = $request->recompenses;
        $actor->biography = $request->biography;

        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $destinationPath = public_path() . '/uploads/actor/';
            $file->move($destinationPath, $filename);
        }

        $actor->image = asset('uploads/actor/'.$filename);


        $actor->save();

        Session::flash('success', "L'acteur {$actor->firstname} {$actor->lastname} est injecté dans la BDD.");

        return Redirect::route('actors.index');
    }

}