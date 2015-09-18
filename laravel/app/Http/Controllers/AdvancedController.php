<?php

namespace App\Http\Controllers;
use App\Http\Requests\DirectorsRequest;
use App\Model\Actors as actorsdb;
use App\Model\Movies as moviesdb;
use App\Model\Cinema as cinedb;
use App\Model\Task as taskdb;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class AdvancedController extends Controller
{


// INDEX ACTORS
    public function index()
    {

        $datas = [
            "cinemas" => $this->mapz(),
            "commentscine" => $this->commentcin(),
            "tasks" => $this->task(),
            "graphact" => $this->grapact(),
            "actages" => $this->fromage(),
            "bestreal" => $this->bestreal(),



        ];

        return view('advanced', $datas);
    }


    public function mapz() {
        $query = db::select('SELECT cinema.title, cinema.id, cinema.ville, COUNT(sessions.movies_id) as movcompt FROM cinema INNER JOIN sessions ON cinema.id = sessions.cinema_id GROUP BY cinema.id');
        return $query;
    }

    public function commentcin() {
        $query = db::select('SELECT cinema.title as cinetitle, movies.title, movies.image, commentscinema.comments, commentscinema.accroche FROM commentscinema JOIN movies ON movies.id = commentscinema.movies_id JOIN cinema ON cinema.id = commentscinema.cinema_id');
        return $query;
    }

    public function task() {
        $query = db::select('SELECT task.id, task.task, task.level, task.state, movies.title, task.movies_id as taskmov from task JOIN movies ON movies.id = task.movies_id WHERE task.state = 1');
        return $query;
    }

    public function taskaction(\Illuminate\Http\Request $request)
    {

        $task = $request->input('taskouz');
        dump($task);

        foreach ($task as $id) {
            $movie = taskdb::find($id);
            $movie->state = 0;
            $movie->save();
        }

        return Redirect::route('advanced');
    }

    public function grapact() {
        $query = db::select('SELECT COUNT(id) as county, city FROM actors GROUP BY city');
        return $query;
    }

    public function fromage() {
        $query = DB::select('SELECT ROUND(TIMESTAMPDIFF (YEAR, dob, now()) ) as Coucou FROM actors');
        return $query;
    }

    public function bestreal() {
        $query = DB::select('SELECT COUNT(directors_movies.movies_id) AS dirtot, directors.id, directors.firstname, directors.lastname
                                FROM directors_movies
                                JOIN movies ON movies.id = directors_movies.movies_id
                                JOIN directors ON directors.id = directors_movies.directors_id
                                GROUP BY directors.firstname
                                ORDER BY COUNT(directors_movies.movies_id) DESC
                                LIMIT 4');

        return $query;
    }




}