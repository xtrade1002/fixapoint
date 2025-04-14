<?php
use app\_utils\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $receiverName = $_POST['receiver_name'] ?? '';
    $senderName   = $_POST['sender_name'] ?? 'Admin';
    $messageText  = $_POST['message'] ?? '';

    if (empty($receiverName) || empty($messageText)) {
        header('Location: contactmessage.php?status=missing');
        exit;
    }

    require_once __DIR__ . '/../../../_utils/Database.php';

    $db = new Database();
    $pdo = $db->getConnection();
    $stmt = $pdo->prepare("SELECT email FROM messages WHERE name = :name ORDER BY submitted_at DESC LIMIT 1");
    $stmt->execute(['name' => $receiverName]);
    $row = $stmt->fetch();

    if ($row && !empty($row['email'])) {
        $to = $row['email'];
        $subject = "Válasz az üzenetedre";
        $headers = "From: info@teoldalad.hu\r\n";
        $headers .= "Reply-To: info@teoldalad.hu\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8";

        $body = "Kedves $receiverName!\n\n" . $messageText . "\n\nÜdvözlettel,\n$senderName";

        if (mail($to, $subject, $body, $headers)) {
            header("Location: contactmessage.php?user=" . urlencode($receiverName) . "&status=sent");
            exit;
        } else {
            header("Location: contactmessage.php?user=" . urlencode($receiverName) . "&status=failed");
            exit;
        }
    } else {
        header("Location: contactmessage.php?user=" . urlencode($receiverName) . "&status=noemail");
        exit;
    }
}
?>
