<html>
<head>
  <link rel="stylesheet" type="text/css" href="/stylesheet.css">
  <title>Validation</title> </head>
<body>
<style> table,tr {border: 1px solid black;}</style>
<h1>Validation des réservations</h1> <hr>
<table>
			<tr>
				<td> Destination </td>
				<td> <?php echo $_SESSION['reservation'][0] ?> </td>
			</tr>
			<tr>
				<td>Nombre de places</td>
				<td><?php echo $_SESSION['reservation'][1]?></td>
			</tr>
      <tr>
        <td>Assurance Annulation</td>
        <td><?php echo $_SESSION['reservation'][2]?></td>
      </tr>
<?php
for ($j=0;$j<count($_SESSION['names']);$j++)
{ ?>
  <tr>
    <td>Nom</td>
    <td> <?php echo $_SESSION['names'][$j][0]?></td>
  </tr>
  <br>
  <tr>
    <td>Age</td>
    <td><?php echo $_SESSION['names'][$j][1]?></td>
      <br>
  </tr>
  <?php
}
?>

  </table>

 <form method='post' action='confirmation.php'>
 	<input type='submit' value='Etape suivante'/>
</form> <form method='post' action='traitement.php'>
 	<input type='submit' value='Retour à la page précédente'/>
</form> <form method='post' action='annulation.php'>
 	<input type='submit' value='Annuler la réservation'/>
 </form>

</body>
</html>
