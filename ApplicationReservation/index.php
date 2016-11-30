<?php
session_start();
 if(!empty($_GET['page'])&&is_file('controllers/'.$_GET['page'].'.php'))
 {
   include '/Applications/MAMP/htdocs/ApplicationReservation/controllers/'.$_GET['page'].'.php';
 }
else {
  include 'accueil.php';
}
