<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 18/12/2016
 * Time: 23:21
 */
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');

//Giving the basic informations of the Database

//Creating the Database $db
$db=new Database();

//Opening the $db: open database = $mydb
$mydb=$db->OpenDatabase($db);

$PeopleIDs=$_SESSION['PeopleIDs'];
$people=$_GET['people'];
$array=explode(' ',$people);

for($i=0;$i<count($array);$i+=3)
{
    $ID=$PeopleIDs[$i];
    $FirstName=$array[$i];
    $LastName=$array[$i+1];
    $Age=$array[$i+2];
    //First Delete the Old Row, then Add a New One
    $query="UPDATE `people` SET FirstName`=".$FirstName.",`LastName`=".$LastName.",`Age`=".$Age." WHERE PeopleID =".$ID;
    $mydb->query($query);
    $db->AddPeople($FirstName,$LastName,$Age,"people",$resID); //New Row

}
echo $array;