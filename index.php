<?php
session_start();
include "classReservation.php";
if ($_SESSION)
{
  $reservation=unserialize($_SESSION['reservation']);
}
else {
  $reservation=new reservation($destination,$number);
}
include "Application_Reservation.php";
?>
