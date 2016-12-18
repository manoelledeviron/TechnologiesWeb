<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 17/12/2016
 * Time: 19:00
 */
session_start();
function FindPeople($resID,$search,$people){
    foreach($search as $row) {
        if ((int)$row[3]==$resID) {
            array_push($people,array($row[0],$row[1],$row[2],$row[3]));
        }
    }
    return $people;
}
function FindDestination($destID,$search,$dest) {
    foreach($search as $row) {
        if ((int)$row[0]==$destID) {
            $dest+=array($row[0],$row[1]);
        }
    }
    return $dest;
}

include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');

$people=array();
$dest=array();

$db=new Database("ApplicationReservations");
$mydb=$db->OpenDatabase($db);
//Searches
$reservations=$db->Select2($mydb,"*","ReservationsComplete");
$persons=$db->Select2($mydb,"*","people");
$destinations=$db->Select2($mydb,"*","destinations");

$reservations=mysqli_fetch_all($reservations);
$persons=mysqli_fetch_all($persons);
$destinations=mysqli_fetch_all($destinations);
$new_array=array();

foreach ($reservations as $row) {
    $resID=$row[0];
    $destID=$row[1];
    $assur=$row[2];
    $array["people"]=FindPeople($resID,$persons,$people);
    $array["destination"]=FindDestination($destID,$destinations,$dest);
    $array["assurance"]=$assur;
    array_push($new_array,$array);
}
//var_dump($new_array);
$_SESSION['array']=$new_array;
$ReservationsComplete="ReservationsComplete";
$Destinations="destinations";
$host="localhost";
$user="root";
$password="root";
include_once("/Applications/MAMP/htdocs/ApplicationReservation/Views/5.database.php");