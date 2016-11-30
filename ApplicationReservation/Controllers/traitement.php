<?php
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');
session_start();

try {
    if(isset($_POST['destination'])===FALSE){
        throw new Exception($_POST['destination']);
    }
    else {
        $dest=$_POST['destination'];
        $num=$_POST['number'];
        if (!ISSET($_POST['assurance']))
        {$assur='false';}
        else {$assur='true';}
    }
}
catch (Exception $e)
{
    if (ISSET($_SESSION['reservation'])) {
        $dest = $_SESSION['reservation'][0];
        $num = $_SESSION['reservation'][1];
        $assur = $_SESSION['reservation'][2];
    }
}

$reserv=new Reservation($dest,$num,$assur);
$_SESSION['reservation']=array($reserv->getDestination(),$reserv->getNumber(),$reserv->getAssurance());

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/2.traitement.php');
