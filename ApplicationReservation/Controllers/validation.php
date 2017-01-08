<?php
include_once('/Applications/MAMP/htdocs/ApplicationReservation/model.php');

if(!isset($_SESSION))
{
    session_start();
}

/* Creating an array "person" for each person to put each firstname,
lastname and age as one element in the array "names" in the session*/
if (isset($_SESSION['names']))
{
    // Creating an empty array
    $_SESSION['names']=array();
}

for ($i=0;$i < count($_POST['lastname']);$i++)
{
    // Verifying the values
    $lastname=secure($_POST['lastname'][$i]);
    $firstname=secure($_POST['firstname'][$i]);
    if ($_POST['age'][$i]>120)
    {
        echo "not valid";
    }

    // Making the array "person"
    $person=array($lastname,$firstname,$_POST['age'][$i]);
    // Adding the array "person" to the session
    $_SESSION['names'][]=$person;
}

include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/3.validation.php');

