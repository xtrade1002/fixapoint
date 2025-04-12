<?php
namespace app\dao;

use app\_utils\Database;

class AppointmentDao
{
    private $connection;

    public function __construct()
    {
        // Kapcsolódás az adatbázishoz
        $this->connection = (new Database())->getConnection();
    }

    // Minden foglalás lekérése
    public function getAllAppointments()
    {
        // Lekérdezzük az összes foglalást
        $sql = "SELECT * FROM appointments 
                JOIN services ON appointments.service_id = services.id 
                JOIN users ON appointments.user_id = users.id";
        
        // Előkészítjük és futtatjuk a lekérdezést
        $stmt = $this->connection->query($sql);
        
        // Az összes rekordot lekérjük és visszaadjuk
        return $stmt->fetchAll();
    }

    // Foglalás hozzáadása
    public function addAppointment($user_id, $service_id, $date, $time, $status)
    {
        // Foglalás beszúrása az adatbázisba
        $sql = "INSERT INTO appointments (user_id, service_id, date, time, status, created_at) 
                VALUES (?, ?, ?, ?, ?, NOW())";
        
        $stmt = $this->connection->prepare($sql);
        
        // A paramétereket a lekérdezéshez rendelhetjük
        $stmt->execute([$user_id, $service_id, $date, $time, $status]);

        // Visszaadjuk az utolsó beszúrt rekord azonosítóját
        return $this->connection->lastInsertId();
    }

    // Foglalás módosítása
    public function updateAppointment($id, $user_id, $service_id, $date, $time, $status)
    {
        // Foglalás frissítése az adatbázisban
        $sql = "UPDATE appointments 
                SET user_id = ?, service_id = ?, date = ?, time = ?, status = ? 
                WHERE id = ?";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$user_id, $service_id, $date, $time, $status, $id]);
    }

    // Foglalás törlése
    public function deleteAppointment($id)
    {
        // Foglalás törlése az adatbázisból
        $sql = "DELETE FROM appointments WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}
