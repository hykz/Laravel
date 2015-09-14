<?php

namespace App\Http\Controllers;
use App\Http\Requests\MoviesRequest;
use App\Http\Requests\Request;
use App\Model\Movies as moviesdb;
use App\Model\Category as catdb;
use Illuminate\Redis\Database;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
class MoviesController extends Controller
{

// INDEX ACTORS
    public function index($val = 0)
    {

        switch ($val) {
            case 0:
                $datas = [
                    "movies" => moviesdb::All()
                ];
                break;
            case 1:
                $datas = ["movies" => moviesdb::where('languages', 'vo')->get()];
                break;
            case 2:
                $datas = ["movies" => moviesdb::where('languages', 'vf')->get()];
                break;
            case 3:
                $datas = ["movies" => moviesdb::where('languages', 'vost')->get()];
                break;
            case 4:
                $datas = ["movies" => moviesdb::where('languages', 'vostfr')->get()];
                break;
            case 5:
                $datas = ["movies" => moviesdb::where('visible', 1)->get()];
                break;
            case 6:
                $datas = ["movies" => moviesdb::where('visible', 0)->get()];
                break;
            case 7:
                $datas = ["movies" => moviesdb::where('distributeur', 'Warner_Bros')->get()];
                break;
            case 8:
                $datas = ["movies" => moviesdb::where('distributeur', 'HBO')->get()];
                break;
        }


        return view('Pages/Movies/index', $datas);
    }

// CREATE DIRECTORS
    public function create()
    {
        $datas = [
            'categories' => catdb::all()
        ];
        return view('Pages/Movies/create', $datas);
    }

// UPDATE DIRECTORS
    public function update($id)
    {
        return view('Pages/Movies/update', ['id' => $id]);
    }

// DELETE MOVZ
    public function delete($id)
    {
        $mov = moviesdb::find($id);
        $mov->delete();

        Session::flash('success', "Le fillm : {$mov->title} a bien été supprimé.");

        return Redirect::route('movies.index');
    }

// READ DIRECTORS
    public function read($id)
    {
        return view('Pages/Movies/read', ['id' => $id]);
    }

// SEARCH FUNCTION
    public function search($lan = 'FR', $vis = 1, $test = 3)
    {
        return view('Pages/Movies/search',
            ['lan' => $lan,
                'vis' => $vis,
                'test' => $test]
        );
    }

// ACTIVE / DISABLE COVER
    public function cover($id, $cover)
    {
        if ($cover == 1) {
            $mov = moviesdb::find($id);
            $mov->cover = 0;
            $mov->save();
            Session::flash('success', "Cover désactivé");
        } elseif ($cover == 0) {
            $mov = moviesdb::find($id);
            $mov->cover = 1;
            $mov->save();
            Session::flash('success', "Cover activé");
        }
        return Redirect::route('movies.index');
    }

// ACTIVE / DISABLE VISIBLE

    public function visible($id, $visible)
    {
        if ($visible == 1) {
            $mov = moviesdb::find($id);
            $mov->visible = 0;
            $mov->save();
            Session::flash('success', "Visible désactivé");
        } elseif ($visible == 0) {
            $mov = moviesdb::find($id);
            $mov->visible = 1;
            $mov->save();
            Session::flash('success', "Visible activé");
        }

        return Redirect::route('movies.index');
    }

// FUNCTION BUTTON SEARCH

    public function Select(\Illuminate\Http\Request $request)
    {

        $movies = $request->input('admin');
        dump($movies);
        if (count($movies) == 0) {
            Session::flash('warning', "Aucun film sélectionné");

        } else {
            switch (Input::get('selectors')) {
                case 0:
                    if ($movies == null) {

                    }
                    else {
                        Session::flash('warning', "Selectionne une action");
                    }
                    break;
                case 1:
                    foreach ($movies as $id) {
                        $movie = moviesdb::find($id);
                        $movie->delete();
                    }
                    Session::flash('success', "Les films sont supprimé");
                    break;
                case 2:
                    foreach ($movies as $id) {
                        $movie = moviesdb::find($id);
                        $movie->visible = 1;
                        $movie->save();
                    }
                    Session::flash('success', "Les films sont visible");
                    break;
                case 3:
                    foreach ($movies as $id) {
                        $movie = moviesdb::find($id);
                        $movie->visible = 0;
                        $movie->save();
                    }
                    Session::flash('success', "Les films sont invisible");
                    break;

            }


        }
        return Redirect::route('movies.index');
    }


    // UPDATE ACTORS
    public function post(MoviesRequest $request) {
        $movies = new moviesdb();
        $movies->title = $request->title;
        $movies->type_film = $request->type_film;
        $movies->synopsis = $request->synopsis;
        $movies->description = $request->description;
        $movies->distributeur = $request->distributeur;
        $movies->bo = $request->bo;
        $movies->annee = $request->annee;
        $movies->duree = $request->duree;
        $movies->note_presse = $request->note_presse;
        $movies->trailer = $request->trailer;
        $movies->categories_id = $request->categories_id;


        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $destinationPath = public_path() . '/uploads/movies/';
            $file->move($destinationPath, $filename);
        }

        $movies->image = asset('uploads/movies/'.$filename);


        $movies->save();

        Session::flash('success', "Le film : {$movies->title} est injecté dans la BDD.");

        return Redirect::route('movies.index');
    }

    public  function postfast(\Illuminate\Http\Request $request) {
        $movie = new moviesdb();
        $movie->title = $request->input('title');
        $movie->synopsis = $request->input('synopsis');
        $movie->categories_id = $request->input('categories_id');
        $movie->save();
        return response()->json(['reponse' => true]);
    }

    // DB CAT



}