<html>

<head>
	<link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">

	<title>Détail</title>

</head>

<body>

<h1>Détail des réservations en cours</h1>
<hr>

<form action='validation.php' method = 'post'>

<?php
$res=$_SESSION['reservation'];

for ($i = 0; $i < $res[1]; $i++) {
    if (isset($_SESSION['names'][$i]))
    {
        $person=$_SESSION['names'][$i];
    }
    else
    {
        $person[0]="nom";
        $person[1]="prénom";
        $person[2]="age";
    }
    ?>
    <table>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="lastname[]" value=<?php echo $person[0]?> ></td>
        </tr>

        <br>

        <tr>
            <td>Prénom</td>
            <td><input type="text" name="firstname[]" value=<?php echo $person[1]?>></td>
        </tr>

        <br>

        <tr>
            <td> Age </td>
            <td><input type="text" name="age[]" value=<?php echo $person[2]?>></td>
        </tr>

    </table>
    <?php
}?>

 	<input type='submit' value='Etape suivante'/>
</form>

<form method='post' action='/ApplicationReservation/accueil.php' name="page" value="">
 	<input type='submit' value='Retour à la page précédente'/>
</form>

<form method='post' action='annulation.php' name="page" value="annulation">
 	<input type='submit' value='Annuler la réservation'/>
</form>

</body>

</html>
