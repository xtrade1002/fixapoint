<?php
require_once(__DIR__ . '/header.php');

require_once __DIR__ . '/../../../_utils/Database.php';

use app\_utils\Database;

$db = new Database();
$pdo = $db->getConnection();
$selectedUser = isset($_GET['user']) ? $_GET['user'] : null;
?>

<section>
  <div class="container py-5 w-70">
    <div class="row">
      <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
  <h5 class="font-weight-bold mb-3 text-center text-lg-start">Üzenetek</h5>
  <div class="card">
    <div class="card-body">
      <ul class="list-unstyled mb-0">
        <?php
          $query = $pdo->prepare("SELECT m1.name, m1.subject, SUM(CASE WHEN m1.is_read = 0 THEN 1 ELSE 0 END) as unread_count FROM messages m1 INNER JOIN (SELECT name, MAX(submitted_at) as last_time FROM messages GROUP BY name) m2 ON m1.name = m2.name AND m1.submitted_at = m2.last_time GROUP BY m1.name, m1.subject ORDER BY m1.submitted_at DESC");      
          $query->execute();  
          while ($row = $query->fetch()) {
          $name = htmlspecialchars($row['name']);
            $subject = htmlspecialchars($row['subject']);
            $unread = $row['unread_count'] > 0;
            $active = $selectedUser === $name ? 'active' : '';

            $badge = $unread 
            ? "<span class='fw-bold text-primary float-end'>ÚJ</span>" : "";
        
          echo "<li class='mb-2'>
                  <a href='?user=" . urlencode($name) . "' 
                     class='d-block p-3 rounded message-card text-decoration-none text-dark $active'>
                    <div class='d-flex justify-content-between align-items-center'>
                      <div class='fw-semibold fs-6'>$name</div>
                      $badge
                    </div>
                    <div class='text-muted small'>$subject</div>
                  </a>
                </li>";
          }
        ?>
      </ul>
    </div>
  </div>
</div>

<div class="col-md-6 col-lg-7 col-xl-8">
  <ul class="list-unstyled">
    <?php
    if ($selectedUser) {
      $pdo->prepare("UPDATE messages SET is_read = 1 WHERE name = :name")->execute(['name' => $selectedUser]);
      $query = $pdo->prepare("SELECT * FROM messages WHERE name = :name ORDER BY submitted_at ASC");
      $query->execute(['name' => $selectedUser]);
      while ($msg = $query->fetch()) {
        $name = htmlspecialchars($msg['name']);
        $subject = htmlspecialchars($msg['subject']);
        $text = htmlspecialchars($msg['message']);
        $time = date('Y-m-d H:i', strtotime($msg['submitted_at']));
    echo "<li class='mb-4'>
                <div class='border-bottom pb-3'>
                  <div class='d-flex justify-content-between align-items-center'>
                    <div class='fw-bold'>Név: $name</div>
                    <div class='text-muted small'>Tárgy: $subject</div>
                  </div>
                  <hr>
                  <div>
                    <p class='mb-1'>$text</p>
                    <div class='text-end'>
                      <small class='text-muted' style='white-space: nowrap;'>
                        " . date('Y. m. d.', strtotime($time)) . " - " . date('H:i', strtotime($time)) . "
                      </small>
                    </div>
                  </div>
                </div>
              </li>";
      }
    } else {
      echo "<p class='text-muted'>Válassz ki egy felhasználót a bal oldalon.</p>";
    }
    ?>
  </ul>
  <?php /*
  <?php if ($selectedUser): ?>
    <div class="bg-light p-3 rounded shadow-sm">
      <form method="POST" action="send_message.php">
        <div class="mt-5">
          <label for="message" class="form-label fw-bold">Válasz</label>
          <textarea class="form-control" id="message" name="message" rows="3" placeholder="Írd ide a válaszod..." required></textarea>
        </div>
        <input type="hidden" name="sender_name" value="Admin">
        <input type="hidden" name="receiver_name" value="<?= htmlspecialchars($selectedUser) ?>">
        <input type="hidden" name="subject" value="Válasz az üzenetedre">
        <div class="text-end">
          <button type="submit" class="btn btn-primary">Küldés</button>
        </div>
      </form>
    </div>
    <?php endif; ?>
    */ ?>
  </div>
</div>
</div>
</section>

<style>
.message-card {
  transition: background-color 0.2s ease-in-out, box-shadow 0.2s;
  border: 1px solid #e0e0e0;
  background-color: #fff;
}
.message-card:hover {
  background-color: #f8f9fa;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}
.message-card.active {
  background-color: #e9f5ff;
  border-color: #3399ff;
}
</style>


<script src="messages.js"></script>
