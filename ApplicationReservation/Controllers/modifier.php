<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 18/12/2016
 * Time: 00:04
 */
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');
if (!isset($_SESSION))
{
    session_start();
}

//Creating the Database $db
$db=new Database();
$my_db=$db->OpenDatabase($db);

$res_id=$_POST["res"];
$_SESSION['res']=$res_id;

$request=$db->Select($my_db,'*','people','ResID',$res_id);
$res=$db->Select($my_db,'*','ReservationsComplete','ResID',$res_id);

$num=mysqli_num_rows($res);
$insur=mysqli_fetch_row($res);

$insur=$insur[2];
$people=array();
foreach ($request as $row) {
    $person=array();
    $thisone=$row['FirstName']." ".$row['LastName']." ".$row['Age'];
    $people[$row['PeopleID']]=$thisone;
}
$_SESSION['People']=$people;
$_SESSION['insurance']=$insur;

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/6.modifier.php');
