<?php
require_once __DIR__ . '/../../../controller/dashboard/AppointmentController.php';

use app\controller\dashboard\AppointmentController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    if ($id) {
        $controller = new AppointmentController();
        $result = $controller->deleteAppointment($id);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Időpont sikeresen törölve.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Hiba történt a törlés során.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Hiányzó ID!']);
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="text-center mb-4">Időpont törlése</h2>

    <div class="alert alert-warning text-center">
        Biztosan törölni szeretnéd az alábbi időpontot?
    </div>

    <form method="POST" action="delete_appointment.php" class="text-center">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($appointment['id'] ?? ''); ?>">

        <p><strong>Ügyfél neve:</strong> <?php echo htmlspecialchars($appointment['client_name']); ?></p>
        <p><strong>Szolgáltatás ID:</strong> <?php echo htmlspecialchars($appointment['service_id']); ?></p>
        <p><strong>Dátum:</strong> <?php echo htmlspecialchars($appointment['appointment_date']); ?></p>
        <p><strong>Időpont:</strong> <?php echo htmlspecialchars($appointment['appointment_time']); ?></p>

        <a href="appointments.php" class="btn btn-secondary me-2">Mégse</a>
        <button type="submit" class="btn btn-danger fw-bold">Törlés</button>
    </form>
</div>