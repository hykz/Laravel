<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\Model\Category as catdb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
class CategoryController extends Controller {



// INDEX ACTORS
    public function getIndex() {

        $datas = [
            "categories" => catdb::all(),
            "bestcat" => $this->bestcat(),
            "nomov" => $this->nomov(),
            "bestbudg" => $this->bestbudg(),
            "randomz" => $this->randomz()
        ];
        return view('Pages/Category/index', $datas);
    }

// CREATE ACTORS
    public function getCreate() {
        return view('Pages/Category/create');
    }

// UPDATE ACTORS
    public function getUpdate($id) {
        return view('Pages/Category/update', ['id' => $id]);
    }

// DELETE ACTORS
    public function getDelete($id) {
        $categorie = catdb::find($id);
        $categorie->delete();
        Session::flash('success', "La catégorie {$categorie->title} a bien été supprimé. ");
        return Redirect::route('category.index');
    }

// READ ACTORS
    public function getRead($id) {
        return view('Pages/Category/read', ['id' => $id]);
    }
// BEST CATEGORY VIEW
    public function bestcat() {
        $query = DB::table('movies')->join('categories', 'movies.categories_id', '=' , 'categories.id')->select('categories.title')->groupBy('categories.title')->orderBy(DB::raw('count(movies.categories_id)'), 'desc')->first();

        return $query;
    }

    // CATEGORY 0 FILM
    public function nomov() {
        $query = DB::table('categories')->select('id')->whereNotIn('id', function($q){
            $q->select('categories_id')->from('movies'); })->count();

        return $query;
    }

    // BEST BUDGET

    public function bestbudg() {
        $query = DB::table('movies')->join('categories', 'movies.categories_id', '=' , 'categories.id')->select('categories.title')->groupBy('categories.title')->orderBy(DB::raw('sum(movies.budget)'), 'desc')->first();

        return $query;
    }

    // RANDOM WIDGETS

    public function randomz() {

        $query = catdb::all()->random(1);
        return $query;

    }

    // UPDATE ACTORS
    public function postPost(CategoryRequest $request) {
        $category = new catdb();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->description = $request->description;

        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $destinationPath = public_path() . '/uploads/category/';
            $file->move($destinationPath, $filename);
        }

        $category->image = asset('uploads/category/'.$filename);


        $category->save();

        Session::flash('success', "La catégorie {$category->title} est injecté dans la BDD.");

        return Redirect::route('category.index');
    }

}