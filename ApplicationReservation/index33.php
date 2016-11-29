<?php
include_once("model.php");
session_start();

if (!ISSET($_SESSION['reservation']))
{
  $reserv=new Reservation();
  $_SESSION['reservation']=$reserv;
}
else {
  $reserv=$_SESSION['reservation'];
}

$step = isset($_POST['step']) ? $_POST['step'] : NULL;
if ($step && $_SERVER["REQUEST_METHOD"] == "POST")
{
    switch ($step)
    {

        case 1:
            if (isset($_SESSION['assurance'])){
                $reservation->setAssurance(true);
            }
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation')
            {
                session_destroy();
                include('Application_Reservation.php');
                $step=NULL;

                break;
            }
            else{

                if (empty($_POST["destination"])) {
                    $destErr = "Destination requise";
                    $error=true;
                } else {
                    $reservation->_destination=($_POST['destination']);
                    $destErr="";
                }
                if (empty($_POST["places"])) {
                    $placesErr = "Entrer un nombre de places";
                    $error=true;}

                //to insure us that the number will be between the span of the numbers attended
                //already taken by the min and max value of the type number
                else if ($_POST["places"]<1 || $_POST["places"]>10) {
                    $placesErr = "Entrer un nombre de places valide (entre 1 et 10)";
                    $error=true;
                } else {
                    $reservation->setPlace($_POST['places']);
                    $placesErr="";
                }



                $reservation->setPlace($_POST['places']);
                if (isset($_POST["assurance"])){

                    $reservation->assurance=true;
                }

                $_SESSION['reserv']=serialize($reservation);
                if($error==true){
                    include('view_reserv.php');
                    break;
                }
                else{
                    include('view_detail.php');
                    break;
                }



            }
            break;


        case 2:
            $reservation=unserialize($_SESSION['reserv']);
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation')
            {
                session_destroy();
                $step=NULL;
                include('view_reserv.php');


                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente"){
                include('view_reserv.php');
                $step=1;

                break;

            }
            else{

                for($i=0;$i<$reservation->getPlace();$i++){
                    array_push($passengers, array($_POST["exampleInputName".$i]));
                    array_push($passengers[$i],$_POST["exampleInputAge".$i]);
                    $reservation->setPersonne($passengers);

                }

                /*

               if (empty($_POST["name"])) {
                   $nameErr = "Nom requis";
                   $error=true;
               }
               else {
                   $reservation->setName($_POST['name']);
                   $nameErr="";

               if (empty($_POST["age"])) {
                   $ageErr = "Age requis";
                   $error=true;
               }
               else {
                   $reservation->setAge($_POST['age']);
                   $ageErr="";

               */

                $_SESSION['reserv']=serialize($reservation);
                include('view_valid.php');
                break;

            }

            break;
        case 3:
            $reservation=unserialize($_SESSION['reserv']);
            if (isset($_POST['cancel']) && $_POST['cancel']=="Annuler la réservation")
            {
                session_destroy();
                $_assurance=NULL;
                include('view_reserv.php');
                $step=NULL;

                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente"){
                include('/Applications/MAMP/htdocs/ApplicationReservation/Views/traitement.php');
                $step=2;

                break;

            }
            $_SESSION['reserv']=serialize($reservation);
            include('confirmation.php');
            break;


    }
}

else
    {
        switch ($step)
        {

            default:
                include('/Applications/MAMP/htdocs/ApplicationReservation/views/Application_Reservation.php');

        }
    }


echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
 ?>
