<html> <head>
<title>Validation</title> </head>
<body>
<style> table,tr {border: 1px solid black;}</style>
<?php echo "<h1>Validation des réservations</h1>" ?> <hr>
<table>
<?php
$dest=$_SESSION['destination'];
$num=$_SESSION['number'];
$names=$_SESSION['names'];
$ages=$_SESSION['ages'];
for ($i=0;$i<$num;$i++)
 {
     $_SESSION['name[]']= $_REQUEST['name'];
     $_SESSION['age[]']= $_REQUEST['age'];
     $names=$names+","+$_SESSION['name[]'];
     $ages=$ages+","+$_SESSION['age[]'];
 }
 echo "
			<tr>
				<td> Destination </td>
				<td> $dest </td>
			</tr>
			<tr>
				<td>Nombre de places</td>
				/<td>$num</td>
			</tr>";
 echo print_r($_SESSION);
for ($j=0;$j<$num;$j++)
{	echo "
			<tr>
				<td>Nom</td>
				<td>$names[$j]</td>
			</tr>
			<br>
			<tr>
				<td>Age</td>
				<td>$ages[$j]</td> <br>
			</tr>";
}
  ?>
  </table>

 <?php
 echo "<form method='post' action='confirmation.php'>
 	<input type='submit' value='Etape suivante'/>
 </form> <form method='post' action='traitement.php'>
 	<input type='submit' value='Retour à la page précédente'/>
 </form> <form method='post' action='annulation.php'>
 	<input type='submit' value='Annuler la réservation'/>
 </form>";

?>
</body>
</html>
