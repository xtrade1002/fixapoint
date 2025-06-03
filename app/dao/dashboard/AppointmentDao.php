<?php
namespace app\dao\dashboard;

use app\_utils\Database;

class AppointmentDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function getAllAppointments()
    {
        $sql = "SELECT * FROM appointments JOIN services ON appointments.service_id = services.id JOIN users ON appointments.user_id = users.id";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    public function addAppointment($user_id, $service_id, $date, $time, $status)
    {
        $sql = "INSERT INTO appointments (user_id, service_id, date, time, status, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$user_id, $service_id, $date, $time, $status]);
        return $this->connection->lastInsertId();
    }

    public function updateAppointment($id, $user_id, $service_id, $date, $time, $status)
    {
        $sql = "UPDATE appointments SET user_id = ?, service_id = ?, date = ?, time = ?, status = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$user_id, $service_id, $date, $time, $status, $id]);
    }

    public function deleteAppointment($id)
    {
        $sql = "DELETE FROM appointments WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}
