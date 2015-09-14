<?php

namespace App\Http\Controllers;
use App\Model\Comments as commentdb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class CommentsController extends Controller {



// INDEX ACTORS
    public function getIndex() {

        $datas = [
            "comments" => commentdb::all()

        ];
        return view('Pages/Comments/index', $datas);
    }


    public function Select(\Illuminate\Http\Request $request)
    {

        $movies = $request->input('coucou');
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
                        $movie = commentdb::find($id);
                        $movie->delete();
                    }
                    Session::flash('success', "Les films sont supprimé");
                    break;
                case 2:
                    foreach ($movies as $id) {
                        $movie = commentdb::find($id);
                        $movie->state = 1;
                        $movie->save();
                    }
                    Session::flash('success', "Les films sont visible");
                    break;
                case 3:
                    foreach ($movies as $id) {
                        $movie = commentdb::find($id);
                        $movie->state = 0;
                        $movie->save();
                    }
                    Session::flash('success', "Les films sont invisible");
                    break;

            }


        }
        return Redirect::route('comments.index');
    }



}