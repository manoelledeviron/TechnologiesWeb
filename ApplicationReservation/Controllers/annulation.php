<?php
//100% php
if (!isset($_SESSION)) {
    session_start();
}
//This step deletes everything from the Session
session_unset();
//Going back to the homepage
header('Location: /ApplicationReservation/index.php');

