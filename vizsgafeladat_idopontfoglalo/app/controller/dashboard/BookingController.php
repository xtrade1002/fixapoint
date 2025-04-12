<?php
require_once '../model/Booking.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking = new Booking(
        $_POST['name'],
        $_POST['phone'],
        $_POST['service'],
        $_POST['duration'],
        $_POST['slot']
    );
    $booking->save();
}
