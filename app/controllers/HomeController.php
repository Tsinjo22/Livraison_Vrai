<?php

namespace app\controllers;

use Flight;

class HomeController {

    public function index(){
        Flight::render('accueil');
    }
}
