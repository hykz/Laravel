<?php

namespace App\Http\Controllers;
use App\Model\Users as usersdb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class ProfessionalController extends Controller
{

// INDEX ACTORS
    public function index()
    {
        $datas = [
            'bestcats' => $this->bestcat(),
            'commentscine' => $this->commentcinema()

        ];

        return view('professional', $datas);
    }


    // BEST CATEGORY VIEW
     public function bestcat() {
         $query = DB::select('SELECT SUM(budget) as budg , categories_id, categories.title
                                FROM movies
                                JOIN categories ON categories.id = movies.categories_id
                                GROUP BY categories_id
                                ORDER BY SUM(budget) DESC
                                LIMIT 4');

         return $query;
     }

    public function commentcinema() {
        $query = DB::select('SELECT COUNT(comments.movies_id) as totcom, cinema.title FROM comments JOIN cinema_movies ON comments.movies_id = cinema_movies.movies_id JOIN cinema ON cinema.id = cinema_movies.cinemas_id GROUP BY cinema.title ORDER BY COUNT(comments.movies_id) DESC LIMIT 6');

        return $query;
    }


}