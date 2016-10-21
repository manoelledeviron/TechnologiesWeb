

<html> <head>
<title>Détail</title> </head>
<body>
<style> table,tr {border: 1px solid black;}</style>
<?php echo "<h1>Détail des réservations</h1>" ?> <hr>
<table>
<?php
//lists in php???

$_SESSION['destination']=$_REQUEST['destination'];
$_SESSION['number']=$_REQUEST['number'];
if (isset($_POST['assurance']))
{$_SESSION['assurance']='Yes';}
else
{$_SESSION['assurance']='No';}
for ($i=0;$i<$_SESSION['number'];$i++)
{
	echo "
	<form method='post' action='validation.php'>
	<table>
		<tr>
			<td>Nom</td>
			<td><input type='text' name='name' /></td>
		</tr>
		<br>
		<tr>
			<td>Age</td>
			<td><input type='text' name='age' /></td> <br>
		</tr>
	</table>";
	//$_SESSION['names']=$_SESSION['names']+","+$_REQUEST['name'];
	//$_SESSION['ages']=$_SESSION['ages']+$_REQUEST['age'];
}
  ?>
  </table>

 <?php
 echo "<form method='post' action='validation.php'>
 	<input type='submit' value='Etape suivante'/>
 </form> <form method='post' action='Application_Reservation.php'>
 	<input type='submit' value='Retour à la page précédente'/>
 </form> <form method='post' action='annulation.php'>
 	<input type='submit' value='Annuler la réservation'/>
 </form>";
?>
</body>
</html>
