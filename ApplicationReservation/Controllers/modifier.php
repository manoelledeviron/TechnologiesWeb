<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 18/12/2016
 * Time: 00:04
 */
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');

//Creating the Database $db
$db=new Database();
$mydb=$db->OpenDatabase($db);

$ResID=$_POST["Res"];
$_SESSION['res']=$ResID;
$request=$db->Select($mydb,'*','people','ResID',$ResID);
$res=$db->Select($mydb,'*','ReservationsComplete','ResID',$ResID);

$num=mysqli_num_rows($res);
$assur=mysqli_fetch_row($res);
var_dump($assur);
$assur=$assur[2];

$peopleIDs=array();
foreach ($request as $row) {
    array_push($peopleIDs,$row['PeopleID']);
    var_dump($row);
}
$_SESSION['PeopleIDs']=$peopleIDs;
$_SESSION['assur']=$assur;

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/6.modifier.php');
