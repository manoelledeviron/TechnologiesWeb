<?php
session_start();
$todaysdate=strtotime('today');
$paydate=strtotime("+2 weeks", $todaysdate);
include_once('/Applications/MAMP/htdocs/ApplicationReservation/views/4.confirmation.php');

