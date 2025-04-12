<?php
require_once __DIR__ . '/../../../_utils/config.php';
include_once __DIR__ . '/header.php';
?>

<div class="container mt-5">
  <h1 class="text-center">Üdvözlünk, <?= htmlspecialchars($_SESSION['fullName']) ?>!</h1>

  <!-- Naptárfejléc -->
  <div class="d-flex justify-content-between align-items-center my-4">
      <button class="btn btn-outline-primary rounded-circle px-3" onclick="loadPrevWeek()">←</button>
      <div class="text-center">
        <h4 id="dateRange" class="mb-0">2025. ápr. 7 – 13.</h4>
      </div>
      <button class="btn btn-outline-primary rounded-circle px-3" onclick="loadNextWeek()">→</button>
  </div>

  <!-- Időpont táblázat -->
  <div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
      <thead class="table-light">
        <tr>
          <th></th>
          <?php foreach (['Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat', 'Vasárnap'] as $nap): ?>
            <th><?= $nap ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        for ($hour = 8; $hour <= 21; $hour++) {
            foreach ([':00',':15', ':30', ':45'] as $minute) {
                $time = $hour . $minute;
                echo "<tr>";
                echo "<th class='text-end pe-3'>$time</th>";
                for ($i = 0; $i < 7; $i++) {
                    echo "<td class='slot' onclick=\"openBookingModal('2025-04-" . (7 + $i) . " $time')\"></td>";
                }
                echo "</tr>";
            }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modális űrlap -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="bookingForm" method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Időpont foglalása</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="slot" id="slotInput">
        <div class="mb-3">
          <label class="form-label">Név</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Telefonszám</label>
          <input type="tel" class="form-control" name="phone" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Szolgáltatás</label>
          <input type="text" class="form-control" name="service" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Időtartam (perc)</label>
          <input type="number" class="form-control" name="duration" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Foglalás</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/app/public/js/booking.js"></script>
