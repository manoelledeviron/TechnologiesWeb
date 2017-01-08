<?php
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');
if(!isset($_SESSION))
{
    session_start();
}
try {
    /*If the user clicked on "go back", there is no 'destination', so the values were already
    in the Session => exception raised */
    if(!isset($_POST['destination'])){
        if ($page="validation") {
            throw new Exception();
        }
    }
    // Otherwise, the data is taken from the POST
    else {
        $dest=secure($_POST['destination']);
        $num=(int)$_POST['number'];
        if (!ISSET($_POST['insurance']))
        {$insur='false';}
        else {$insur='true';}
    }
}
catch (Exception $e)
{
    //Getting the data from the session
    if (ISSET($_SESSION['reservation'])) {
        $dest = $_SESSION['reservation'][0];
        $num = $_SESSION['reservation'][1];
        $insur = $_SESSION['reservation'][2];
    }
}

// All the data is saved in the session
$reserv=new Reservation($dest,$num,$insur);
$_SESSION['reservation']=array($reserv->getDestination(),$reserv->getNumber(),$reserv->getinsurance());

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/2.traitement.php');
