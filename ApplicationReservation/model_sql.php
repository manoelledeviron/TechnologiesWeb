<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 29/11/2016
 * Time: 21:55
 */
$mysqli=new mysqli("localhost","username","password","dbname");
if($mysqli->connect_errno)
{
    echo "Echec lors de la connexion à mySQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
}
$mysqli->close();