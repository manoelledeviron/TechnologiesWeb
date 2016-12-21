<html>

<head>
    <link rel="stylesheet" type="text/css" href="views/styles.css">

    <title>Réservation</title>

</head>

<body>

<h1>Réservation d'un voyage</h1>
<hr>

<p>Le prix de la <u>place</u> est de <u>10 euros jusqu'à 12 ans</u>, et ensuite de <u>15 euros</u>.</p>
<p>Le prix de l'<u>assurance annulation</u> est de <u>20 euros</u> quel que soit le nombre de voyageurs.</p>

<form method='post' action="controllers/traitement.php" name="page" value="traitement">
    <table>
        <tr>
            <td> Destination </td>
            <td> <input type='text' name='destination' placeholder='Destination' value="<?php echo $destination?>" required></td>
        </tr>

        <br>

        <tr>
            <td> Nombre de places </td>
            <td> <input type='number' name='number' min="1" max="10" placeholder="0" value="<?php echo $number?>"  required> </td>
        </tr>

        <br>

        <tr>
            <td> Assurance annulation </td>
            <td> <?php
                if ($assurance==='true')
                {?>
                    <input type='checkbox' name='assurance' value=<?php echo $assurance?> checked><?;
                }
                else {?>
                            <input type='checkbox' name='assurance' value=<?php echo $assurance?>><?;
                } ?> </td>
        </tr>
        <br>
    </table>

    <input type='submit' value='Etape suivante'/>
</form>

<form method='post' action='controllers/annulation.php' name='page' value='annulation'>
    <input type='submit' value='cancel' >
</form>

</body>
<footer style="position:absolute; bottom:0; width:95%; text-align:right;padding-right:30px;">
    <form method="post" action="controllers/database.php" name="page" value="database">
        <input style="background-color:powderblue;border-style:none" type="submit" value="by">Manoëlle de Viron
    </form>
</footer>
</html>
