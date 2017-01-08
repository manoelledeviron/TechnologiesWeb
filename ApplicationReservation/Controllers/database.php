<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 17/12/2016
 * Time: 19:00
 */

//Starting the session (if necessary)
if(!isset($_SESSION))
{
    session_start();
}

//Adding a function FindPeople to make an array of the people from the ResID
function FindPeople($res_id,$search,$people){
    foreach($search as $row) {
        if ((int)$row[4]==$res_id) {
            array_push($people,array($row[1],$row[2],$row[3],$row[4],$row[0]));
        }
    }
    return $people;
}

include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');

//Making arrays for each information: People, Destination and an array to group all the information
$people=array();
$dest=array();
$new_array=array();

//Opening the Database
$db=new Database();
$my_db=$db->OpenDatabase();

//Searches
$reservations=$db->Select2($my_db,"*","ReservationsComplete");
$persons=$db->Select2($my_db,"*","people");

$reservations=mysqli_fetch_all($reservations);
$persons=mysqli_fetch_all($persons);

//Finding all the information about the reservations
foreach ($reservations as $row) {
    $res_id=$row[0];
    $dest=$row[1];
    $insur=$row[2];
    $array['destination']=$dest;
    $array["people"]=FindPeople($res_id,$persons,$people);
    $array["insurance"]=$insur;
    //adding the array to the "new array"
    array_push($new_array,$array);
}

//Adding the array to the session
$_SESSION['array']=$new_array;

include_once("/Applications/MAMP/htdocs/ApplicationReservation/Views/5.database.php");