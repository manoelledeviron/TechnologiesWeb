<?php
session_start();
if (isset($_SESSION['names']))
{
    $_SESSION['names']=array();
}

for ($i=0;$i < count($_POST['lastname']);$i++)
{
    $person=array($_POST['lastname'][$i],$_POST['firstname'][$i],$_POST['age'][$i]);
    $_SESSION['names'][]=$person;
}



include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/3.validation.php');

