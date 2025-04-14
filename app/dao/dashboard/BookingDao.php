<?php
class Booking {
    private $name, $phone, $service, $duration, $slot;
    private $pdo;

    public function __construct($name, $phone, $service, $duration, $slot) {
        $this->name = $name;
        $this->phone = $phone;
        $this->service = $service;
        $this->duration = $duration;
        $this->slot = $slot;
        $this->pdo = new PDO("mysql:host=localhost;dbname=idopont", "root", "");
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO bookings (name, phone, service, duration, slot) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->name, $this->phone, $this->service, $this->duration, $this->slot]);
    }
}
