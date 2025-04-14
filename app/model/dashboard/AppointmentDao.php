<?php
namespace app\model\dashboard;

require_once(__DIR__ . '/../../_utils/Database.php');
require_once(__DIR__ . '/../ICrudDao.php');
require_once(__DIR__ . '/Appointment.php');

require_once(__DIR__ . '/../../model/UserDao.php');

use app\_utils\Database as Db;
use app\model\ICrudDao;


class AppointmentDao implements ICrudDao
{
    public function getAll()
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT a.id, u.fullName AS userName, u.email, u.phone, a.date, a.time, a.status, s.nameOfService AS serviceName
                FROM appointments a INNER JOIN users u ON a.user_id = u.id INNER JOIN services s ON a.service_id = s.id ORDER BY a.date, a.time";
        $statement = $connection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function insertAppointment($clientName, $serviceId, $appointmentDate, $appointmentTime) {
        require_once '../config/database.php';
    
        $sql = "INSERT INTO appointments (client_name, service_id, appointment_date, appointment_time) 
                VALUES (?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$clientName, $serviceId, $appointmentDate, $appointmentTime]);
    }

    public function updateAppointment($id, $clientName, $serviceId, $appointmentDate, $appointmentTime) {
        require_once '../config/database.php';
    
        $sql = "UPDATE appointments 
                SET client_name = ?, service_id = ?, appointment_date = ?, appointment_time = ? 
                WHERE id = ?";
    
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$clientName, $serviceId, $appointmentDate, $appointmentTime, $id]);
    }
    
    public function deleteAppointment($id) {
        require_once __DIR__ . '/../config/database.php';
    
        $sql = "DELETE FROM appointments WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$id]);
    }
    
    
    public function save($appointment): void
    {
        $userId = $_POST['appointment']['user_id'];
        $serviceId = $_POST['appointment']['service_id'];
        $date = $_POST['appointment']['date'];
        $time = $_POST['appointment']['time'];
        $status = $_POST['appointment']['status'] ?? 'pending';

        $appointment = new Appointment($userId, $serviceId, $date, $time, $status);

        $dbObj = new Db();
        $connection = $dbObj->getConnection();

        $sql = "INSERT INTO appointments (`user_id`, `service_id`, `date`, `time`, `status`) VALUES (:userId, :serviceId, :date, :time, :status)";
        $statement = $connection->prepare($sql);
        $statement->execute([
            ':userId' => $appointment->getUserId(),
            ':serviceId' => $appointment->getServiceId(),
            ':date' => $appointment->getDate(),
            ':time' => $appointment->getTime(),
            ':status' => $appointment->getStatus()
        ]);
    }

    public function getById(int $id)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $statement = $connection->prepare("SELECT * FROM appointments WHERE id = :id;");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([':id' => $id]);

        return $statement->fetch();
    }

    public function update($appointment): void
    {
        $userId = $_POST['appointment']['user_id'];
        $serviceId = $_POST['appointment']['service_id'];
        $date = $_POST['appointment']['date'];
        $time = $_POST['appointment']['time'];
        $status = $_POST['appointment']['status'];

        $appointment = new Appointment($userId, $serviceId, $date, $time, $status);

        $dbObj = new Db();
        $connection = $dbObj->getConnection();

        $sql = "UPDATE appointments SET `user_id` = :userId, `service_id` = :serviceId, `date` = :date, `time` = :time, `status` = :status WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([
            ':userId' => $appointment->getUserId(),
            ':serviceId' => $appointment->getServiceId(),
            ':date' => $appointment->getDate(),
            ':time' => $appointment->getTime(),
            ':status' => $appointment->getStatus(),
        ]);
    }

    public function delete($id): void
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "DELETE FROM appointments WHERE id = :id";
        $statement = $connection->prepare($sql);
    }
}
