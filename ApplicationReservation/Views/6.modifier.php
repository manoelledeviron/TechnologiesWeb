<html>

<head>
	<link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">

	<title>Modifier</title>

</head>

<body>

<h1>Modification de la base de données</h1>
<hr>

    <form action="database.php">
    <table>
        <tr>
            <td>Destination</td>
            <td>People</td>
            <td>Assurance</td>
        </tr>
        <?php
    foreach($res as $row) {
        $destination=$row['Destination'];
        $assurance=$row['Assurance'];
    echo "<br>";
    ?>
    <tr>
        <td><input type="text" name="Destination" value="<?php echo $destination?>"></td>
        <td><input type="text" name="People" value="<?php echo $people?>"></td>
        <td><input type="text" name="Assurance" value="<?php echo $assurance?>"</td>
    </tr>
    </table>
    <input type="submit" value="save" name="page"/>
    </form>
<?php }
?>
</body>
</html>