<html>

<head>
	<link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">

	<title>Detail</title>

</head>

<body>

<h1>Details of ongoing reservations</h1>
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
        $person[0]="";
        $person[1]="";
        $person[2]="";
    }
    ?>
    <table>
        <tr>
            <td>Last name</td>
            <td><input type="text" name="lastname[]" placeholder="Lastname" value="<?php echo htmlspecialchars($person[0])?>" required></td>
        </tr>

        <br>

        <tr>
            <td>First name</td>
            <td><input type="text" name="firstname[]" placeholder="Firstname" value="<?php echo htmlspecialchars($person[1])?>" required></td>
        </tr>

        <br>

        <tr>
            <td> Age </td>
            <td><input type="number" name="age[]" min="0" max="130" placeholder="0" value="<?php echo (int)$person[2]?>" required></td>
        </tr>

    </table>
    <?php
}?>

 	<input type='submit' value='Next step'/>
</form>

<form method='post' action='/ApplicationReservation/accueil.php' name="page" value="">
 	<input type='submit' value='Go back'/>
</form>

<form method='post' action='annulation.php' name="page" value="annulation">
 	<input type='submit' value='Cancel the reservation'/>
</form>

</body>

</html>
