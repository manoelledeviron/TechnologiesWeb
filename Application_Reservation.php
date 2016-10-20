<?php
session_start();
?>

<html> <head>
<title>Réservation</title> </head>
<body>
<style> table,tr {border: 1px solid black;}</style>
<?php echo "<h1>Réservation</h1>" ?> <hr>
<?php 
$dest="";
$number=0;
$assurance="No";
if ($_SESSION)
{
	$dest=$_SESSION['destination'];
	$number=$_SESSION['number'];
	$assurance=$_SESSION['assurance'];
}
echo "Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.";
echo "<br>";
echo "Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.";


if (isset($_POST['cancel']))
{
    session_destroy();
    header('/Application_Reservation.php');
}
echo "	<form method='post' action='traitement.php'>
	
			<table> 
				<tr>
					<td> Destination </td>
					<td> <input type='text' name='destination' value=$dest /> </td>
				</tr>
				<br>
				<tr>
					<td> Nombre de places </td>
					<td> <input type='number' name='number' value=$number /> </td>
				</tr>
				<br>
				<tr>
					<td> Assurance annulation </td>
					<td> <input type='checkbox' name='assurance' value=$assurance /> </td>
				</tr>
				<br>
		 	</table>
		 
 			<input type='submit' value='Etape suivante'/>
 	
 		</form>
 		<form method='post' action='annulation.php'>
 			<input type='submit' value='cancel' />
 		</form>"; 

 		
 ?>
</body>
</html>