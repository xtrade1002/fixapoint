<?php include_once 'header.php';?>


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
