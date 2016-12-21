<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 18/12/2016
 * Time: 00:04
 */

include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');
$database="ApplicationReservations";
$host="localhost";
$user="root";
$password="root";

//Creating the Database $db
$db=new Database($database);
$mydb=$db->OpenDatabase($db);

$ResID=$_POST["Res"];
$del='DELETE FROM `ReservationsComplete` WHERE `ResID` = '.$ResID;
if ($mydb->query($del)===TRUE)
{
    echo "record deleted successfully";
}
else {
    echo "Error deleting record: ".$mydb->error;
}


include_once('/Applications/MAMP/htdocs/ApplicationReservation/Views/7.supprimer.php');