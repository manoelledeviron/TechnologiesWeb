<?php
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');
session_start();
if (!ISSET($_SESSION['reservation']))
{
  $destination="destination";
  $number=0;
  $assurance="false";
  $reserv=new Reservation($destination,$number,$assurance);
}
else {
  $destination=$_SESSION['reservation'][0];
  $number=$_SESSION['reservation'][1];
  $assurance=$_SESSION['reservation'][2];
}

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/1.Application_Reservation.php');
