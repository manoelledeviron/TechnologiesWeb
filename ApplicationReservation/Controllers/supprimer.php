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
$my_db=$db->OpenDatabase($db);

$res_id=$_POST["res"];
$del='DELETE FROM `ReservationsComplete` WHERE `ResID` = '.$res_id;
if ($my_db->query($del)===TRUE)
{
    echo "record deleted successfully";
}
else {
    echo "Error deleting record: ".$my_db->error;
}


include_once('/Applications/MAMP/htdocs/ApplicationReservation/Views/7.supprimer.php');