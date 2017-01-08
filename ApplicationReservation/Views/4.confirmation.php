<html>

<head>
	<link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">

    <title>Confirmation</title>

</head>

<body>

<h1> Reservations done</h1>
<hr>

<?php
$num=$_SESSION['reservation'][1];
$insurance=$_SESSION['reservation'][2];
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
if ($insurance=='true')
{
	$price=$price+20;
}
$account="BE99 0123 4567 8910";
?>

<p>Your request has been saved. </p>
<p>Now you just have to pay the amount of <b><?php echo $price?> euros</b> on the bank account <b><?php echo $account?></b> before
     <b><?php echo date("m-d-Y",$pay_date)?></b>.</p>
<p>You will receive an e-mail with the tickets as soon as we get the amount due.</p>
<p>Enjoy your trip with our travel agency!</p>

<form method='post' action='/ApplicationReservation/accueil.php' name="page" value="">
 	<input type='submit' value='Back to the homepage'>
</form>

</body>

</html>
