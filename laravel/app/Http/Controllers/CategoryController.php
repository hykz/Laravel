<?php

namespace App\Http\Controllers;
use App\Model\Category as catdb;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller {

// INDEX ACTORS
    public function getIndex() {

        $datas = [
            "categories" => catdb::all()
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

}