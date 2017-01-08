<?php
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');

//No need to start a session if it is already open
if(!isset($_SESSION))
{
    session_start();
}

/* Getting the values from the session if the user already used the application,
and did not cancel
Otherwise: setting default values */
if (!ISSET($_SESSION['reservation']))
{
    $destination="";
    $number="";
    $insurance="false";
    $reserv=new Reservation($destination,$number,$insurance);
}
else {
    $destination=$_SESSION['reservation'][0];
    $number=$_SESSION['reservation'][1];
    $insurance=$_SESSION['reservation'][2];
}

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/1.Application_Reservation.php');
