<?php
namespace app\controller\dashboard;

use app\dao\ServiceDao;

class ServiceController
{
    private $serviceDao;

    public function __construct()
    {
        $this->serviceDao = new ServiceDao();
    }

    // Szolgáltatás hozzáadása
    public function addService($nameOfService, $categoryOfService, $description, $duration, $price)
    {
        $result = $this->serviceDao->addService($nameOfService, $categoryOfService, $description, $duration, $price);
        
        if ($result) {
            return ['status' => 'success', 'message' => 'Szolgáltatás sikeresen hozzáadva.'];
        } else {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatás hozzáadásakor.'];
        }
    }

    // Szolgáltatás módosítása
    public function updateService($id, $nameOfService, $categoryOfService, $description, $duration, $price)
    {
        $result = $this->serviceDao->updateService($id, $nameOfService, $categoryOfService, $description, $duration, $price);
        
        if ($result) {
            return ['status' => 'success', 'message' => 'Szolgáltatás sikeresen módosítva.'];
        } else {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatás módosításakor.'];
        }
    }

    // Szolgáltatás törlése
    public function deleteService($id)
    {
        $result = $this->serviceDao->deleteService($id);
        
        if ($result) {
            return ['status' => 'success', 'message' => 'Szolgáltatás sikeresen törölve.'];
        } else {
            return ['status' => 'error', 'message' => 'Hiba történt a szolgáltatás törlésénél.'];
        }
    }

    // Szolgáltatások lekérése
    public function getAllServices()
    {
        $services = $this->serviceDao->getAllServices();
        if ($services) {
            return $services;
        } else {
            return $services ?: [];
        }
    }

    // Szolgáltatás lekérése ID alapján
    public function getServiceById($id)
    {
        return $this->serviceDao->getServiceById($id);
    }
}
