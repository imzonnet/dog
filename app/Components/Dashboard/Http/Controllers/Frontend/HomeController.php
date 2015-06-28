<?php namespace App\Components\Dashboard\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
       echo 'Home';
    }

}