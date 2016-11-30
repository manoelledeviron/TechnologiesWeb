<?
//100% php
session_start();
session_unset();
session_destroy();
header('Location: /ApplicationReservation/index.php');
 ?>
