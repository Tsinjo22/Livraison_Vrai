<?php

namespace app\controllers;
use app\models\StatusModel;
use app\models\LivraisonModel;
use Flight;

class HomeController {
     
    public function index() {
    $model = new StatusModel();
    $data['statuses'] = $model->LsStatus();
    $data['WhereStatus'] = [];

    Flight::render('accueil', $data);
}

    public function lsLivraison($idStatus) {
        
        $statusModel = new StatusModel();
        $livraisonModel = new LivraisonModel(Flight::db());

        $statuses = $statusModel->LsStatus();
        $statuName = $statusModel->getStatusById($idStatus);
        $WhereStatus = $livraisonModel->getLivraison($idStatus);

        Flight::render('accueil', [
            'statuses'     => $statuses,
            'statuName'    => $statuName,   
            'WhereStatus'  => $WhereStatus,
            'idStatus'     => $idStatus
        ]);
    }
    
    public function colis(){
        Flight::render('colis');
    }
}
