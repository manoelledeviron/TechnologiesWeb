<html>
<head>
    <link rel="stylesheet" type="text/css" href="views/styles.css">
    <title>Database</title>
    <style>
        table {
            border-collapse:collapse;
            width:80%;
        }
        table,th,td {
            border:1px solid black;
            height:50px;
        }
    </style>
</head>
<body>
<table style="border:1px solid black">
    <th>
        <td>Destination</td>
        <td>People</td>
        <td>Assurance</td>
        <td>Modifier</td>
        <td>Supprimer</td>
    </th>

        <?php
        foreach($_SESSION['array'] as $array)
        {
            $ResID=$array['people'][0][3];
            ?>
            <tr>
                <td><?php echo $ResID?> </td>
                <td><?php echo $array["destination"][1]?></td>
                <td> <?php
                foreach($array["people"] as $people)
                {
                    echo $people[0]," ",$people[1]," ",$people[2];
                    echo nl2br("\r\n");
                }
                ?>
                </td>
                <td> <?php echo $array['assurance']?></td>
                <td><a href="modifier.php">Modifier</a></td>
                <td><a href="supprimer.php">Supprimer</a></td>
            </tr>
        <?php
        }
        ?>
</table>
<form method='post' action='/ApplicationReservation/accueil.php' name="page" value="">
    <input type='submit' value='Retour à la page précédente'/>
</form>
</body>
</html>