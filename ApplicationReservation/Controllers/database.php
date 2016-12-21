<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 17/12/2016
 * Time: 19:00
 */
if(!isset($_SESSION))
{
    session_start();
}

function FindPeople($resID,$search,$people){
    foreach($search as $row) {
        if ((int)$row[4]==$resID) {
            array_push($people,array($row[1],$row[2],$row[3],$row[4],$row[0]));
        }
    }
    return $people;
}

include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');

$people=array();
$dest=array();
$new_array=array();


$db=new Database();
$mydb=$db->OpenDatabase($db);
//Searches
$reservations=$db->Select2($mydb,"*","ReservationsComplete");
$persons=$db->Select2($mydb,"*","people");

$reservations=mysqli_fetch_all($reservations);
$persons=mysqli_fetch_all($persons);

foreach ($reservations as $row) {
    $resID=$row[0];
    $dest=$row[1];
    $assur=$row[2];
    $array['destination']=$dest;
    $array["people"]=FindPeople($resID,$persons,$people);
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