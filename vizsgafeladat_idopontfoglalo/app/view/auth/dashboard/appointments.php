<?php
use app\controller\dashboard\AppointmentController;

require_once '../../../controller/dashboard/AppointmentController.php';

$controller = new AppointmentController();
$appointments = $controller->getAllAppointments();

include_once 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mt-5 mb-5 fs-2">Foglalások</h2>
            <div class="d-flex justify-content-end mb-3">
                <a href="add_appointment.php" class="btn btn-primary">Új hozzáadása</a>
            </div>
            <table class="table table-bordered text-center table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Email</th>
                        <th>Telefonszám</th>
                        <th>Dátum</th>
                        <th>Időpont</th>
                        <th>Szolgáltatás</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($appointments)): ?>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?= $appointment->id; ?></td>
                            <td><?= $appointment->userName; ?></td>
                            <td><?= $appointment->email; ?></td>
                            <td><?= $appointment->phone; ?></td>
                            <td><?= $appointment->date; ?></td>
                            <td><?= $appointment->time; ?></td>
                            <td><?= $appointment->serviceName; ?></td>
                            <td>
                                <a href="update_appointment.php?id=<?= $appointment->id; ?>" class="btn btn-warning btn-sm">Módosítás</a>
                                <a href="delete_appointment.php?id=<?= $appointment->id; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Biztosan törölni szeretnéd ezt az időpontot?');">Törlés</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Nincs foglalás.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
