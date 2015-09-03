<?php

namespace App\Http\Controllers;
use App\Model\Users as usersdb;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class UsersController extends Controller {

// INDEX ACTORS
    public function index() {
        $datas = [
            "user" => usersdb::All()
        ];

        return view('Pages/Users/index', $datas);
    }


// SEARCH FUNCTION
    public function search($zipcode = '69000',$enable = 0, $city = "Lyon") {
        return view('Pages/Users/search',
            ['zipcode' => $zipcode,
                'enable' => $enable,
                'city' => $city]
        );
    }
    public function create() {
        return view('Pages/Users/create');
    }

    // DELETE
    public function delete($id) {
        $user = usersdb::find($id);
        $user->delete();

        Session::flash('success', "L'utilisateur {$user->username} a bien été supprimé.");

        return Redirect::route('users.index');
    }

    // UPDATE DIRECTORS
    public function update($id) {
        return view('Pages/Users/update', ['id' => $id]);
    }

    public function read($id = null){
        $datas = [
            'directors' => usersdb::find($id) /*trouver un acteur par son id*/
        ];
        return view('Pages/Users/read', $datas);
    }
}

