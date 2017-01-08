<html>
<head>
    <link rel="stylesheet" type="text/css" href="/Applicationreservation/views/styles.css">
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
<h1>
    Database
</h1>
<table style="border:1px solid black">
    <th>
        <td>Destination</td>
        <td>People</td>
        <td>Insurance</td>
        <td>Update</td>
        <td>Delete</td>
    </th>

        <?php
        foreach($_SESSION['array'] as $array)
        {
            $res=$array['people'][0][3];
            $people_ids=$array['people'][0][4];
            ?>
            <tr>
                <td><?php echo $res?> </td>
                <td><?php echo $array["destination"]?></td>
                <td> <?php
                foreach($array["people"] as $person)
                {
                    echo $person[0]," ",$person[1]," ",$person[2],"<br>";
                }
                ?>
                </td>
                <td> <?php echo $array['insurance']?></td>
                <td><form method="post" action="modifier.php"><button name="res" value="<?php echo $res ?>">Update</button></form></td>
                <td><form method="post" action="supprimer.php"><button name="res" value="<?php echo $res ?>">Delete</button></form></td>
            </tr>
        <?php
        }
        ?>
</table>
<form method='post' action='/Applicationreservation/accueil.php' name="page" value="">
    <input type='submit' value='Go back'/>
</form>
</body>
</html>