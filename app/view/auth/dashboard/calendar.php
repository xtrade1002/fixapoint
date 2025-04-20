<?php
session_start();
date_default_timezone_set('Europe/Budapest');
include_once __DIR__ . '/../header.php';


$weekOffset = isset($_GET['week']) ? (int)$_GET['week'] : 0;
$monday = strtotime("monday this week +$weekOffset week");
$days = [];
for ($i = 0; $i < 7; $i++) {
    $days[] = strtotime("+$i day", $monday);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['start_hour'] = $_POST['start_hour'];
    $_SESSION['end_hour'] = $_POST['end_hour'];
    $_SESSION['work_days'] = $_POST['days'] ?? [];
}
$selectedDays = $_SESSION['work_days'] ?? [];
$startHour = $_SESSION['start_hour'] ?? 8;
$endHour = $_SESSION['end_hour'] ?? 14;



if (isset($_GET['book'])) {
    $_SESSION['booked_slots'][] = $_GET['book'];
}
$bookedSlots = $_SESSION['booked_slots'] ?? [];
?>


<h2 class="text-center mt-5 mb-3">Heti naptár (<?= date('Y.m.d', $days[0]) ?> – <?= date('Y.m.d', $days[6]) ?>)</h2>

<div style="margin-bottom: 10px;"  class="text-center mb-3">
    <a href="?week=<?= $weekOffset - 1 ?>">⬅ Előző hét</a> |
    <a href="?week=0">Aktuális hét</a> |
    <a href="?week=<?= $weekOffset + 1 ?>">Következő hét ➡</a>
</div>

<div class="calendar-wrapper">
<table>
    <tr>
        <th>Idő</th>
        <?php foreach ($days as $day): ?>
            <th><?= date('D', $day) ?><br><?= date('m.d', $day) ?></th>
        <?php endforeach; ?>
    </tr>

    <?php
    $now = time();
    $roundedNow = ceil($now / 600) * 600; 

    for ($hour = $startHour; $hour < $endHour; $hour++) {
        for ($min = 0; $min < 60; $min += 10) {
            $labelTime = mktime($hour, $min);
            if ($labelTime < $roundedNow) continue; 

            $label = date('H:i', $labelTime);
            echo "<tr><td class='hour-col'>$label</td>";

            foreach ($days as $day) {
                $dayKey = strtolower(date('D', $day));
                $dateStr = date('Y-m-d', $day);
                $slotId = $dateStr . '_' . $label;

                if (in_array($slotId, $bookedSlots)) {
                    echo "<td class='booked'>Foglalt</td>";
                } elseif (in_array($dayKey, $selectedDays)) {
                    echo "<td><form method='GET'>
                        <input type='hidden' name='week' value='$weekOffset'>
                        <input type='hidden' name='book' value='$slotId'>
                        <button type='submit' class='slot-button'>Foglalás</button>
                    </form></td>";
                } else {
                    echo "<td></td>";
                }
            }

            echo "</tr>";
        }
    }
    ?>
</table>
</div>

<div class="container mb-5 mt-5 ">
<h3>Munkaidő beállítás</h3>
<form method="POST">
    <label>Munka kezdete: 
        <input type="number" name="start_hour" value="<?= $startHour ?>" min="0" max="23"> :
        <input type="number" name="start_minute" value="<?= $startMinute ?>" min="0" max="59"> 
    </label>
    <label> - vége: 
        <input type="number" name="end_hour" value="<?= $endHour ?>" min="0" max="23"> :
        <input type="number" name="end_minute" value="<?= $endMinute ?>" min="0" max="59"> 
    </label>
    <br><br>

    <?php
    $daysMap = ['mon' => 'Hétfő', 'tue' => 'Kedd', 'wed' => 'Szerda', 'thu' => 'Csütörtök', 'fri' => 'Péntek', 'sat' => 'Szombat', 'sun' => 'Vasárnap'];
    foreach ($daysMap as $key => $label) {
        $checked = in_array($key, $selectedDays) ? 'checked' : '';
        echo "<label><input type='checkbox' name='days[]' value='$key' $checked> $label</label> ";
    }
    ?>
    <br><br>
    <button type="submit">Beállítások mentése</button>
</form>
</div>

