<html>
<head>
	<link rel="stylesheet" type="text/css" href="/stylesheet.css">
	<title>Détail</title>
</head>
<body>
<h1>Détail des réservations</h1>
<hr>
<form action='validation.php' method = 'post'>

<?php
$res=$_SESSION['reservation'];

for ($i = 0; $i < $res[1]; $i++) {
    if (isset($_SESSION['names']))
    {
        $person=$_SESSION['names'][$i];
    }
    else
    {
        $person[0]="name";
        $person[1]="age";
    }
    ?>
    <table>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="name[]" value=<?php echo $person[0]?> ></td>
        </tr>
        <br>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age[]" value=<?php echo $person[1]?>></td>
            <br>
        </tr>
    </table>
    <?php
}?>



 	<input type='submit' value='Etape suivante'/>
</form>
<a href="javascript:history.go(-1)"><form method='post' action='accueil.php'>
 	<input type='submit' value='Retour à la page précédente'/>
</form></a> <form method='post' action='annulation.php'>
 	<input type='submit' value='Annuler la réservation'/>
 </form>

</body>
</html>
