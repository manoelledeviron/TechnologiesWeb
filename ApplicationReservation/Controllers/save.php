<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 18/12/2016
 * Time: 23:21
 */
if (!isset($_SESSION)) {
    session_start();
}
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model_sql.php');

//Giving the basic informations of the Database

//Creating the Database $db
$db=new Database();

//Opening the $db: open database = $my_db
$my_db=$db->OpenDatabase();
$res_id=$_SESSION['res'];
$people_ids=$_SESSION['People'];
$destination=secure($_POST['Destination']);
$insurance=(int)$_POST['insurance'];

if (count($people_ids)==1) {
    $id=array_keys($people_ids)[0];
    $new_name=secure($_POST["id".$id]);
    if ($new_name!="") {
        $person=explode(' ',$new_name);
        $request = $my_db->prepare("UPDATE `people` SET `FirstName`=?,`LastName`=?,`Age`=? WHERE `PeopleID` =?");
        $request->bind_param("ssss",$person[0],$person[1],$person[2],$id);
        $test=$request->execute();
        $result = $request->get_result();
    }
    else {
        $request=$my_db->prepare("DELETE FROM `people` WHERE `PeopleID`=?");
        $request->bind_param("s",$id);
        $test=$request->execute();
        $result=$request->get_result();
    }
}

else {
    foreach (array_keys($people_ids) as $id) {
        $new_name = secure($_POST["id".$id]);
        if ($new_name!="") {
            $person = explode(' ', $new_name);
            $request = $my_db->prepare("UPDATE `people` SET `FirstName`=?,`LastName`=?,`Age`=? WHERE `PeopleID` =?");
            $request->bind_param("ssss",$person[0],$person[1],$person[2],$id);
            $test=$request->execute();
            $result = $request->get_result();
        }
        else{
            echo "new name does not exist";
            $request=$my_db->prepare("DELETE FROM `people` WHERE `PeopleID`=?");
            $request->bind_param("s",$id);
            $test=$request->execute();
            $result=$request->get_result();
        }
    }
}
$request = $my_db->prepare("UPDATE `ReservationsComplete` SET `Destination`=?,`Insurance`=? WHERE `ResID` =?");
$request->bind_param("sii",$destination,$insurance,$res_id);
$test=$request->execute();
$result = $request->get_result();

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/8.save.php');