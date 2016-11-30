<html>

<head>
	<link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">

    <title>Confirmation</title>

</head>

<body>

<h1> Réservations effectuées</h1>
<hr>

<?php
$num=$_SESSION['reservation'][1];
$assurance=$_SESSION['reservation'][2];
$people=$_SESSION['names'];
$price=0;

for ($i=0;$i<$num;$i++)
{
	if ($people[$i][2]<=12)
	{
		$price=$price+10;
	}
	else
    {
		$price=$price+15;
	}
}
if ($assurance=='true')
{
	$price=$price+20;
}
$account="BE99 0123 4567 8910";
?>

<p>Votre demande a bien été enregistrée. </p>
<p>Merci de bien vouloir verser la somme de <b><?php echo $price?> euros</b> sur le compte <b><?php echo $account?></b> pour la date
    du <b><?php echo date("d-m-Y",$paydate)?></b>.</p>
<p>Vous recevrez les billets par mail lorsque nous aurons reçu la somme due.</p>
<p>Bon voyage!</p>

<form method='post' action='/ApplicationReservation/accueil.php' name="page" value="">
 	<input type='submit' value='Retour à la page d&#39;accueil'>
</form>

</body>

</html>
