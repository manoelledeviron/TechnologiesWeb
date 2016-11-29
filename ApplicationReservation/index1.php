<?php
//controller
session_start();
include "modele.php";
foreach ($_SESSION as $key=>$val)
  {echo $key;}

include("model.php");


include "classReservation.php";
include "classTraitement.php";

try
  {
    $destination=unserialize($_SESSION['destination']);
    $number=unserialize($_SESSION['number']);
  }

catch(Exception $e)
  {
    echo $e;
    //$reservation=new reservation($destination,$number);
  }
include "Application_Reservation.php" ;
try {
  $_SESSION['destination'];
  $_SESSION['number'];
  Reservation($_SESSION['destination'],$_SESSION['number'],$_SESSION['assurance']);
  echo "reservation set";
} catch (Exception $e){
  echo $e;
}


echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

//include "traitement.php";

?>
