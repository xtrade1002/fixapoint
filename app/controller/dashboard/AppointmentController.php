<?php
namespace app\controller\dashboard;

require_once(__DIR__ . '/../ICrudController.php');
require_once(__DIR__ . '/../../model/UserDao.php');
require_once(__DIR__ . '/../../model/dashboard/ServiceDao.php'); 
require_once(__DIR__ . '/../../dao/dashboard/AppointmentDao.php');


use app\controller\ICrudController;
use app\model\UserDao;
use app\model\dashboard\ServiceDao;
use app\dao\dashboard\AppointmentDao;
use app\model\dashboard\Appointment;

class AppointmentController implements ICrudController 
{
    
    public function load($view, $data = []) {
        extract($data);
        include_once(__DIR__ . "/../../../view/{$view}.php");
    }
    
    public function getAllAppointments() {
        $dao = new AppointmentDao();
        return $dao->getAll();
    }
    
    public function updateAppointment($id, $clientName, $serviceId, $appointmentDate, $appointmentTime) {
        require_once __DIR__ . '/../../dao/dashboard/AppointmentDao.php';
        $dao = new AppointmentDao();
        return $dao->updateAppointment($id, $clientName, $serviceId, $appointmentDate, $appointmentTime);
    }

    public function deleteAppointment($id) {
        require_once __DIR__ . '/../../../dao/dashboard/AppointmentDao.php';
        $dao = new AppointmentDao();
        return $dao->deleteAppointment($id);
    }
    

    public function getAppointmentById($id) {
        require_once __DIR__ . '/../../../dao/dashboard/AppointmentDao.php';
        $dao = new AppointmentDao();
        return $dao->getById($id);
    }
    
    

    public function listAll()
{
    $appointmentDao = new AppointmentDao();
    $appointments = $appointmentDao->getAll();

    return $this->load('list', [
        'appointments' => $appointments
    ]);
}

public function addAppointment($clientName, $serviceId, $appointmentDate, $appointmentTime) {
    require_once __DIR__ . '/../../dao/dashboard/AppointmentDao.php';
    $dao = new AppointmentDao();
    return $dao->insertAppointment($clientName, $serviceId, $appointmentDate, $appointmentTime);
}


public function save()
{
    $userDao = new UserDao();
    $serviceDao = new ServiceDao();

    $users = $userDao->getAll();
    $services = $serviceDao->getAll();

    if (isset($_POST['appointment']['save'])) {
        $userId = $_POST['appointment']['user_id'];
        $serviceId = $_POST['appointment']['service_id'];
        $date = $_POST['appointment']['date'];
        $time = $_POST['appointment']['time'];
        $status = $_POST['appointment']['status'] ?? 'pending';

        $appointment = new Appointment($userId, $serviceId, $date, $time, $status);

        $dao = new AppointmentDao();
        $dao->save($appointment);

        header('Location: index.php');
        exit;
    }

    return $this->load('create', [
        'users' => $users,
        'services' => $services
    ]);
}


    public function loadObjToEdit(int $id)
    {
        $appointmentDao = new AppointmentDao();
        $userDao = new UserDao();
        $serviceDao = new ServiceDao();

        $appointmentData = $appointmentDao->getById($id);
        $users = $userDao->getAll();
        $services = $serviceDao->getAll();

        return $this->load('edit', [
            'appointmentData' => $appointmentData,
            'users' => $users,
            'services' => $services
        ]);
    }

    public function loadObjToDelete(int $id)
    {
        $appointmentDao = new AppointmentDao();
        $appointmentData = $appointmentDao->getById($id);

        return $this->load('delete', [
            'appointmentData' => $appointmentData
        ]);
    }

    public function updateById(int $id)
    {
        $appointmentDao = new AppointmentDao();
        if (isset($_POST['appointment']['update'])) {
            $appointmentDao->update($id, $_POST['appointment']);
            header('Location: index.php');
        }
    }

    public function deleteById(int $id)
    {
        $appointmentDao = new AppointmentDao();
        if (isset($_POST['delete'])) {
            $appointmentDao->delete($id);
            header('Location: index.php');
        }
    }
}
