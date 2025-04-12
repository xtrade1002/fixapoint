<?php
namespace app\controller\dashboard;

use app\dao\AppointmentDao;

class AppointmentController
{
    private $appointmentDao;

    public function __construct()
    {
        $this->appointmentDao = new AppointmentDao();
    }

    // Minden foglalás lekérése
    public function getAllAppointments()
    {
        return $this->appointmentDao->getAllAppointments();
    }

    // Foglalás hozzáadása
    public function addAppointment($service_name, $customer_name, $date, $price, $status)
    {
        return $this->appointmentDao->addAppointment($service_name, $customer_name, $date, $price, $status);
    }
}
