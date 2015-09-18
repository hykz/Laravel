<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movies extends Model {

    protected $table = 'movies';

    public $timestamps = false;

    public function categories()
    {

            return $this->belongsTo('App\Model\Category');

    }
    public function scopeBestreal1($query, $id) {
        return $query->select('movies.id')->join('directors_movies' , 'movies.id', '=', 'directors_movies.movies_id')->where('directors_movies.directors_id', $id)->whereBetween('movies.date_release', array('2014-01-01', '2015-01-01'));
    }

    public function scopeBestreal2($query, $id) {
        return $query->select('movies.id')->join('directors_movies' , 'movies.id', '=', 'directors_movies.movies_id')->where('directors_movies.directors_id', $id)->whereBetween('movies.date_release', array('2015-01-02', '2015-03-01'));
    }

    public function scopeBestreal3($query, $id) {
        return $query->select('movies.id')->join('directors_movies' , 'movies.id', '=', 'directors_movies.movies_id')->where('directors_movies.directors_id', $id)->whereBetween('movies.date_release', array('2015-03-02', '2015-06-01'));
    }

    public function scopeBestreal4($query, $id) {
        return $query->select('movies.id')->join('directors_movies' , 'movies.id', '=', 'directors_movies.movies_id')->where('directors_movies.directors_id', $id)->whereBetween('movies.date_release', array('2015-06-02', '2015-09-01'));
    }

    public function scopeBestreal5($query, $id) {
        return $query
            ->select('movies.id')
            ->join('directors_movies' , 'movies.id', '=', 'directors_movies.movies_id')
            ->where('directors_movies.directors_id', $id)
            ->whereBetween('movies.date_release', array('2015-09-02', '2015-12-30'))
            ;

    }

    public function scopeBestcat($query, $id, $time) {

        $time2 = sprintf("%02d", $time+1);
        return $query->select('movies.budget')->join('categories' , 'movies.categories_id', '=', 'categories.id')->where('categories.id', $id)->whereBetween('movies.date_release', array('2015-'.$time.'-00', '2015-'.$time2.'-00'));
    }




}