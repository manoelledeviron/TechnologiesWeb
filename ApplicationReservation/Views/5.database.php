<html>
<head>
    <link rel="stylesheet" type="text/css" href="/ApplicationReservation/views/styles.css">
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
            $Res=$array['people'][0][3];
            $PeopleID=$array['people'][0][4]
            ?>
            <tr>
                <td><?php echo $Res?> </td>
                <td><?php echo $array["destination"]?></td>
                <td> <?php
                foreach($array["people"] as $people)
                {
                    echo $people[0]," ",$people[1]," ",$people[2];
                    echo nl2br("\r\n");
                }
                ?>
                </td>
                <td> <?php echo $array['assurance']?></td>
                <td><form method="post" action="modifier.php"><button name="Res" value="<?php echo $Res ?>">Modifier</button></form></td>
                <td><form method="post" action="supprimer.php"><button name="Res" value="<?php echo $Res ?>">Supprimer</button></form></td>
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