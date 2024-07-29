<?php
session_start();
session_unset();
session_destroy();

// Redirect to the main index.php
header('Location: ../index.php');
exit();
