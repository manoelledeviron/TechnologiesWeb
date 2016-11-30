<html>

<head>
    <link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">

    <title>Validation</title>

</head>

<body>

<h1>Validation des réservations</h1>
<hr>

<table>
    <tr>
        <th> Destination </th>
        <th>Nombre de places</th>
        <th>Assurance Annulation</th>
    </tr>

    <tr>
        <td><?php echo $_SESSION['reservation'][0] ?> </td>
        <td><?php echo $_SESSION['reservation'][1]?></td>
        <td><?php echo $_SESSION['reservation'][2]?></td>
    </tr>

</table>

<table>
    <tr>
        <th>Noms</th>
        <th>Prénoms</th>
        <th>Ages</th>
        <th>Under 12?</th>
    </tr>
<?php
for ($j=0;$j<count($_SESSION['names']);$j++)
{ ?>
    <tr>
        <td><?php echo $_SESSION['names'][$j][0]?></td>
        <td><?php echo $_SESSION['names'][$j][1]?> </td>
        <td><?php echo $_SESSION['names'][$j][2]?></td>
        <td><?php if ($_SESSION['names'][$j][2]<=12) {echo "yes";} else {echo "no";};?></td>
    </tr>

    <br>

  <?php
}
?>

</table>

 <form method='post' action='confirmation.php' name="page" value="confirmation">
 	<input type='submit' value='Etape suivante'/>
</form>

<form method='post' action='traitement.php' name="page" value="traitement">
 	<input type='submit' value='Retour à la page précédente'/>
</form>

<form method='post' action='annulation.php' name="page" value="annulation">
 	<input type='submit' value='Annuler la réservation'/>
</form>

</body>

</html>
