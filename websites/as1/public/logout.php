<?php
session_start();// Begin a new session or pick up where you left off.
session_unset(); // Eliminate every session variable.
session_destroy();// Terminate the session.
header('Location: index.php');// After terminating the session, reroute to the index.php page
exit;
?>