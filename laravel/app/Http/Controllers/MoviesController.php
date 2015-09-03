<?php

namespace App\Http\Controllers;
use App\Model\Movies as moviesdb;
use Illuminate\Redis\Database;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class MoviesController extends Controller {

// INDEX ACTORS
    public function index($val = 0)  {

        switch ($val) {
            case [0 , 0]:
                $datas = [
                    "movies" => moviesdb::All()
                ];
                break;
            case [100]:
                $datas =  [ "movies" => moviesdb::where('languages', 'vo')->get() ];
                break;
            case [200]:
                $datas =  [ "movies" => moviesdb::where('languages', 'vf')->get() ];
                break;
            case [300]:
                $datas =  [ "movies" => moviesdb::where('languages', 'vost')->get() ];
                break;
            case [400]:
                $datas =  [ "movies" => moviesdb::where('languages', 'vostfr')->get() ];
                break;
            case [116]:
                $datas =  [ "movies" => moviesdb::where('visible' , 1)->get() ];
                break;
            case [216]:
                $datas =  [ "movies" => moviesdb::where('visible', 1)->get() ];
                break;



        }
        $datas = [
            "movies" => moviesdb::All() ];
        return view('Pages/Movies/index', $datas);
    }

// CREATE DIRECTORS
    public function create() {
        return view('Pages/Movies/create');
    }

// UPDATE DIRECTORS
    public function update($id) {
        return view('Pages/Movies/update', ['id' => $id]);
    }

// DELETE MOVZ
    public function delete($id) {
        $mov = moviesdb::find($id);
        $mov->delete();

        Session::flash('success', "Le fillm : {$mov->title} a bien été supprimé.");

        return Redirect::route('movies.index');
    }
// READ DIRECTORS
    public function read($id) {
        return view('Pages/Movies/read', ['id' => $id]);
    }

// SEARCH FUNCTION
    public function search($lan = 'FR',$vis = 1, $test = 3) {
        return view('Pages/Movies/search',
            ['lan' => $lan,
            'vis' => $vis,
            'test' => $test]
        );
    }
// ACTIVE / DISABLE COVER
public function cover($id,$cover) {
    if ($cover == 1) {
        $mov = moviesdb::find($id);
        $mov->cover = 0;
        $mov->save();
        Session::flash('success', "Cover désactivé");
    }
    elseif ($cover == 0) {
        $mov = moviesdb::find($id);
        $mov->cover = 1;
        $mov->save();
        Session::flash('success', "Cover activé");
    }
    return Redirect::route('movies.index');
}

// ACTIVE / DISABLE VISIBLE

    public function visible($id,$visible) {
        if ($visible == 1) {
            $mov = moviesdb::find($id);
            $mov->visible = 0;
            $mov->save();
            Session::flash('success', "Visible désactivé");
        }
        elseif ($visible == 0) {
            $mov = moviesdb::find($id);
            $mov->visible = 1;
            $mov->save();
            Session::flash('success', "Visible activé");
        }

        return Redirect::route('movies.index');
    }

// FUNCTION BUTTON SEARCH

    public function btnsearch($val) {


    }

}

