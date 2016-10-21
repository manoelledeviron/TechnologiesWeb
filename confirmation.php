
<html> <head>
<title>Confirmation</title> </head>
<body>
<style> table,tr {border: 1px solid black;}</style>
<?php echo "<h1>Validation des réservations</h1>" ?> <hr>
<?php
$dest=$_SESSION['destination'];
$num=$_SESSION['number'];
$assurance=isset($_SESSION['assurance']);
$names=$_SESSION['names'];
$ages=$_SESSION['ages'];
$price=0;
for ($i=0;$i<$num;$i++){
	if ($ages[$i]<=12) {
		echo $i." ".$ages[$i];
		$price=$price+10;
	}
	else {
		$price=$price+15;
	}
}
echo $price;
if ($assurance==1) {
	$price=$price+20;
}
$account="000-0000000-00";

echo "Votre demande a bien été enregistrée. Merci de bien vouloir verser la somme de ".$price." euros sur le compte " .$account;

 echo "<form method='post' action='Application_Reservation.php'>
 	<input type='submit' value='Retour à la page d accueil'/>
 </form>";

?>
</body>
</html>
