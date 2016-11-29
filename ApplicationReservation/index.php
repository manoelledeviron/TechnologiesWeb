<html>
<head>
    <link rel="stylesheet" type="text/css" href="/stylesheet.css">
</head>
</html>
<?php
session_start();
 if(!empty($_GET['page'])&&is_file('/controllers/'.$_GET['page'].'.php'))
 {
   include 'controllers/'.$_GET['page'].'.php';
 }
else {
  include 'controllers/accueil.php';
}
