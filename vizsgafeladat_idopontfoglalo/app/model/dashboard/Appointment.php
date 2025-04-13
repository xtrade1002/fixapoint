<?php
namespace app\model\dashboard;

class Appointment
{
    private int $id;
    private int $userId;
    private int $serviceId;
    private string $date;
    private string $time;
    private string $status;

    public function __construct(int $userId, int $serviceId, string $date, string $time, string $status)
    {
        $this->userId = $userId;
        $this->serviceId = $serviceId;
        $this->date = $date;
        $this->time = $time;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getServiceId()
    {
        return $this->serviceId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getStatus()
    {
        return $this->status;
    }

    

    public function debugObjData()
    {
        echo "<pre>";
        var_dump($this);
        echo "</pre>";
    }
}
