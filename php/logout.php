<?php
session_start();
session_unset();
session_destroy();
header("Location: ../bef_login/index.html"); // Redirect to your login page
exit;
?>