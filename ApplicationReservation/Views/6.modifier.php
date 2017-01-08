<html>

<head>
	<link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">

	<title>Updating the Database</title>

</head>

<body>

<h1>Updating the Database</h1>
<hr>

    <form action="save.php" method="post" name="page" value="save">
    <table>
        <tr>
            <td>Destination</td>
            <td>People</td>
            <td>insurance</td>
        </tr>
        <?php
    foreach($res as $row) {
        $destination=$row['Destination'];
        $insurance=$row['insurance'];

    echo "<br>";
    ?>
    <tr>
        <td><input type="text" name="Destination" value="<?php echo htmlspecialchars($destination)?>"></td>
        <td>
        <?php
            foreach (array_keys($people) as $thisone)
            {
                $key=$thisone;
                $value=$people[$thisone];
                $name="id".$key;
                ?>
                <input type="text" name="<?php echo $name; ?>" value="<?php echo htmlspecialchars($value); ?>"><br>
        <?php
            }
        ?>
        </td>
        <td><input type="number" min="0" max="1" name="insurance" value="<?php echo (int)$insurance?>"</td>
    </tr>
    </table>
    <input type="submit" value="Save" name="page"/>
    </form>
    <form action="database.php" method="post" name="page" value="database">
        <input type="submit" value="Cancel"/>
    </form>
<?php }
?>
</body>
</html>