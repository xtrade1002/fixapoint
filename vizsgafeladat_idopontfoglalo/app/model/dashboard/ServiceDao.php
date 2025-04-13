<?php
namespace app\model\dashboard;
require_once __DIR__ . '/../../_utils/Database.php';
use app\_utils\Database;

class ServiceDao
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addService($nameOfService, $categoryOfService, $description, $duration, $price)
    {
        $connection = $this->db->getConnection();
        $sql = "INSERT INTO services (nameOfService, categoryOfService, description, duration, price) VALUES (?, ?, ?, ?, ?)";
        
        try {
            $statement = $connection->prepare($sql);
            $statement->execute([$nameOfService, $categoryOfService, $description, $duration, $price]);
            return ['status' => 'success', 'message' => 'Szolgáltatás sikeresen hozzáadva.'];
        } catch (\PDOException $e) {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatás hozzáadása közben: ' . $e->getMessage()];
        }
    }

    public function updateService($id, $nameOfService, $categoryOfService, $description, $duration, $price)
    {
        $connection = $this->db->getConnection();
        $sql = "UPDATE services SET nameOfService = ?, categoryOfService = ?, description = ?, duration = ?, price = ? WHERE id = ?";
        
        try {
            $statement = $connection->prepare($sql);
            $statement->execute([$nameOfService, $categoryOfService, $description, $duration, $price, $id]);
            return ['status' => 'success', 'message' => 'Szolgáltatás sikeresen módosítva.'];
        } catch (\PDOException $e) {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatás módosítása közben: ' . $e->getMessage()];
        }
    }



    public function deleteService($id)
    {
        $connection = $this->db->getConnection();
        $sql = "DELETE FROM services WHERE id = ?";
        
        try {
            $statement = $connection->prepare($sql);
            $statement->execute([$id]);
            return ['status' => 'success', 'message' => 'Szolgáltatás sikeresen törölve.'];
        } catch (\PDOException $e) {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatás törlésénél: ' . $e->getMessage()];
        }
    }

    public function getServiceById($id)
    {
        $connection = $this->db->getConnection();
        $sql = "SELECT * FROM services WHERE id = ?";
        
        try {
            $statement = $connection->prepare($sql);
            $statement->execute([$id]);
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatás lekérése közben: ' . $e->getMessage()];
        }
    }

    public function getAllServices()
    {
        $connection = $this->db->getConnection();
        $sql = "SELECT * FROM services";  
        
        try {
            $statement = $connection->query($sql);
            return $statement->fetchAll(\PDO::FETCH_ASSOC); 
        } catch (\PDOException $e) {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatások lekérése közben: ' . $e->getMessage()];
        }
    }

    public function getAll() {
    
        return []; 
    }
}
