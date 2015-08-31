<?php


namespace App\Http\Controllers;

class PagesController extends Controller {

    /**
     * Page Contact
     */
    public function contact(){
        return view('Pages/contact');
    }

    /**
     * Page Mention
     */
    public function mentions() {
        return view('Pages/mentions');
    }

    /**
     * Page FAQ
     */
    public function faq() {
        return view('Pages/faq');
    }
}