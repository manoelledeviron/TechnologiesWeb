<html>
<head>
	<link rel="stylesheet" type="text/css" href="/Applications/MAMP/htdocs/ApplicationReservation/stylesheet.css">
	<title>Confirmation</title> </head>
<body>
<style> table,tr {border: 1px solid black;}</style>
<h1>Validation des réservations</h1><hr>
<?php
$num=$_SESSION['reservation'][1];
$assurance=$_SESSION['reservation'][2];
$people=$_SESSION['names'];
$price=0;
for ($i=0;$i<$num;$i++){
	if ($people[$i][1]<=12) {
		$price=$price+10;
	}
	else {
		$price=$price+15;
	}
}
if ($assurance=='true') {
	$price=$price+20;
}
$account="000-0000000-00";
?>

Votre demande a bien été enregistrée. <br>Merci de bien vouloir verser la somme de <?php echo $price?> euros sur le compte <?php echo $account?>.
<br>Vous recevrez les billets par mail lorsque nous aurons reçu la somme due.<br>
Bon voyage!

<form method='post' action='/ApplicationReservation/controllers/accueil.php' name="page" value="">
 	<input type='submit' value='Retour à la page d accueil'/>
 </form>
</body>
</html>
