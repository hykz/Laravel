<?php

namespace App\Http\Controllers;
use App\Http\Requests\DirectorsRequest;
use App\Model\Actors as actorsdb;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class IndexController extends Controller {


// INDEX ACTORS
    public function index() {

        $datas = [
            "actorsavg" => $this->actavg()[0],
            "fromlyon" => $this->fromlyon(),
            "fromparis" => $this->fromparis(),
            "frommarseille" => $this->frommarseille(),
            "allcomment" => $this->allcomm(),
            "actifcomm" => $this->actifcomm(),
            "queuecomm" => $this->queuecomm(),
            "inactifcomm" => $this->inactifcomm(),
            "actifcommpour" => $this->actifcommpour(),
            "moviesfavo" => $this->moviesfavo(),
            "moviesdiffu" => $this->moviesdiffu(),
            "nextmovie" => $this->nextmovie()

        ];

        return view('welcome', $datas);
    }

// AVG ACTORS
    public function actavg() {
        $query = DB::select('SELECT ROUND(AVG(TIMESTAMPDIFF (YEAR, dob, now())) ) as Coucou FROM actors ');
        return $query;
    }

// ACTORS FROM

    public function fromlyon() {
        $query = DB::table('actors')->where('city' , '=' , 'Lyon')->count();
        return $query;
    }

    public function fromparis() {
        $query = DB::table('actors')->where('city' , '=' , 'Paris')->count();
        return $query;
    }

    public function frommarseille() {
        $query = DB::table('actors')->where('city' , '=' , 'Marseille')->count();
        return $query;
    }

    // COMMENT
        //TOTAL

    public function allcomm() {
        $query = DB::table('comments')->count();
        return $query;
    }

    public function actifcomm() {
        $query = DB::table('comments')->where('state' ,'=','2')->count();
        return $query;
    }

    public function queuecomm() {
        $query = DB::table('comments')->where('state' ,'=','1')->count();
        return $query;
    }

    public function inactifcomm() {
        $query = DB::table('comments')->where('state' ,'=','0')->count();
        return $query;
    }

    // PIE CHARTS

    public function actifcommpour() {
        $query = DB::table('comments')->where('state' ,'=','2')->count();
        $query2 = DB::table('comments')->count();

        $result = round($query * 100 / $query2);
        return $result;
    }

    public function moviesfavo() {
        $query = DB::select('SELECT COUNT(distinct(movies_id)) as Salut FROM user_favoris');
        $query2 = DB::table('movies')->count();


        $result = round($query[0]->Salut * 100 / $query2);

        return $result;
    }

    public function moviesdiffu() {
        $query = DB::select('SELECT COUNT(distinct(movies_id)) as plop FROM sessions');
        $query2 = DB::table('movies')->count();


        $result = round($query[0]->plop * 100 / $query2);

        return $result;
    }

    public function nextmovie() {

        $query = DB::select('SELECT * FROM movies WHERE date_release IS NOT NULL AND date_release > now() ORDER BY date_release asc LIMIT 5');
        return $query;

    }

}

