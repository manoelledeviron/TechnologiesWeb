<?php
if(!isset($_SESSION))
{
    session_start();
}
if (isset($_SESSION['names']))
{
    $_SESSION['names']=array();
}

for ($i=0;$i < count($_POST['lastname']);$i++)
{
    $lastname=strip_tags( trim($_POST['lastname'][$i]));
    $lastname=preg_replace('/[^A-Za-z\-]/', '', $lastname);
    $firstname=strip_tags( trim($_POST['firstname'][$i]));
    $firstname=preg_replace('/[^A-Za-z\-]/', '', $firstname);
    if ($_POST['age'][$i]>120)
    {

        echo "not valid";
    }

    $person=array($lastname,$firstname,$_POST['age'][$i]);
    $_SESSION['names'][]=$person;
}

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/3.validation.php');

