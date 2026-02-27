<?php 
namespace app\models;

use Flight;

class StatusModel {
    private $db;

    public function __construct($db = null) {
        $this->db = $db ?? Flight::db();
    }

    public function LsStatus() {
        $sql = "SELECT * FROM Status";
        return $this->db->fetchAll($sql);
    }

    public function getStatusById($id) {

        $sql = "SELECT * FROM Status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => (int)$id
        ]);

    return $stmt->fetch(\PDO::FETCH_ASSOC); 
}

}


?>