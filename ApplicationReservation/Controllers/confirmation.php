<?php
//Starting the session
if(!isset($_SESSION))
{
    session_start();
}

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

//Opening the Database
//Creating the Database $db
$db=new Database();

//Opening the $db: open database = $mydb
$mydb=$db->OpenDatabase($db);
//Starting to fill the Database
//  ReservationsComplete
$test=$db->AddReservation($mydb,$destination,$assurance);

//  => getting the resID
$resID=$db->Select2($mydb,'*','ReservationsComplete');
foreach ($resID as $row)
{
    $ID=$row['ResID'];
}

//  People
$persons=$_SESSION['names'];
foreach($persons as $people)
{
    $result=$db->AddPeople($people[0],$people[1],$people[2],$mydb,$ID);
}

//Closing the database
$db->CloseDatabase($mydb);
