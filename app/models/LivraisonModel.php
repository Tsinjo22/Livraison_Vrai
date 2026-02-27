<?php 
namespace app\models;

use Flight;

class LivraisonModel {
    private $db;

    public function __construct($db = null) {
        $this->db = $db ?? Flight::db();
    }

    public function getLivraison($idStatus) {

    $sql = "SELECT 
                Livraison.id AS numero,
                Livreur.nom AS livreur,
                Vehicule.num AS vehicule,
                Livraison.depart,
                Livraison.arrivee,
                Livraison.idColis,
                Livraison.idStatus
            FROM Livraison
            JOIN Livreur ON Livraison.idLivreur = Livreur.id
            JOIN Vehicule ON Livraison.idVehicule = Vehicule.id
            WHERE Livraison.idStatus = :idStatus";

    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ':idStatus' => (int)$idStatus
    ]);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
}


?>