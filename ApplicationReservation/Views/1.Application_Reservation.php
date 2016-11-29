<html>
<head>
<link rel="stylesheet" type="text/css" href="ApplicationReservation/stylesheet.css"/>
<title>Réservation</title> </head>

<body>

<h1>Réservation</h1>
<hr>

<p>Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.
  <br>
Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>

  <form method='post' action="controllers/traitement.php" name="page" value="traitement">
    <table>
				<tr>
					<td> Destination </td>
					<td> <input type='text' name='destination' value=<?php echo $destination ?>></td>
				</tr>
				<br>
				<tr>
					<td> Nombre de places </td>
					<td> <input type='number' name='number' value=<?php echo $number ?> > </td>
				</tr>
				<br>
				<tr>
					<td> Assurance annulation </td>
					<td> <input type='checkbox' name='assurance' value=<?php echo $assurance?> > </td>
				</tr>
				<br>
		 	</table>
      <input type='submit' value='Etape suivante'/>
    </form>
    <form method='post' action='controllers/annulation.php' name='page' value='annulation'>
 			<input type='submit' value='cancel' />
 		</form>
</body>
</html>
