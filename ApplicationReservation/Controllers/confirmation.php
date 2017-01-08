<?php
if(!isset($_SESSION))
{
    session_start();
}

//Finding today's date to give the limit payment date (today+2weeks)
$todays_date=strtotime('today');
$pay_date=strtotime("+2 weeks", $todays_date);

//using the view "confirmation"
include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/4.confirmation.php');
//using the model "model_sql"
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');

//Getting the basic informations from the SESSION
$destination=$_SESSION['reservation'][0];
$insurance=$_SESSION['reservation'][2];

//Opening the Database
//Creating the Database $db
$db=new Database();

//Opening the $db: open database = $my_db
$my_db=$db->OpenDatabase();
//Starting to fill the Database
//  ReservationsComplete
$test=$db->AddReservation($my_db,$destination,$insurance);

//  => getting the res_id
$res_id=$db->Select2($my_db,'*','ReservationsComplete');
foreach ($res_id as $row)
{
    $id=$row['ResID'];
}

//  People
$persons=$_SESSION['names'];
foreach($persons as $people)
{
    $result=$db->AddPeople($people[0],$people[1],$people[2],$my_db,$id);
}

//Closing the database
$db->CloseDatabase();
