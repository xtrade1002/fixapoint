<?php
session_start();
session_unset();
session_destroy();
header("Location: /app/view/auth/login.php");
exit;
?>