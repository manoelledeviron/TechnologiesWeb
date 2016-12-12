<?php
//Starting the session
session_start();

//Finding today's date to give the limit payment date (today+2weeks)
$todaysdate=strtotime('today');
$paydate=strtotime("+2 weeks", $todaysdate);

//using the view "confirmation"
include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/4.confirmation.php');
//using the model "model_sql"
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');

//Getting the basic informations from the SESSION
$destination=$_SESSION['reservation'][0];
$assurance=$_SESSION['reservation'][2];

//Giving the basic informations of the Database
$database="ApplicationReservations";
$host="localhost";
$user="root";
$password="root";

//Creating the Database $db
$db=new Database($database);
//Opening the $db: open database = $mydb
$mydb=$db->OpenDatabase($db);

//Starting to fill the Database
//  Destination
$addDest=$db->AddDestination($destination,$mydb);
//  => getting the destID
if (!$addDest) {echo "Error";}
$destID=$db->Select($mydb,'DestID','destinations','Destination',$destination);
$destID=mysqli_fetch_row($destID);

//  ReservationsComplete
$test=$db->AddReservation($mydb,$destID[0],$assurance);
//  => getting the resID
$resID=$db->Select($mydb,'ResID','ReservationsComplete','DestinationID',$destID[0]);
$resID=mysqli_fetch_all($resID);
$num=count($resID);
$resID=$resID[$num-1];

//  People
foreach($_SESSION['names'] as $people)
{
    $result=$db->AddPeople($people[1],$people[0],$people[2],$mydb,$resID[0]);
}

//Closing the database
$db->CloseDatabase($mydb);
