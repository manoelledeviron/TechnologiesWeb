<!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="views/styles.css">

        <title>Reservation</title>

    </head>

    <body>

    <h1>Reservation of a trip</h1>
    <hr>

    <p>One <u>place</u> costs <u>10 euros for children younger than 12 </u>, and for the other people it is <u>15 euros</u>.</p>
    <p>The <u>cancelling insurance</u> costs <u>20 euros</u>, for all the passengers, whether there is one or several passengers.</p>

    <form method='post' action="controllers/traitement.php" name="page" value="traitement">
        <table>
            <tr>
                <td> Destination </td>
                <td> <input type='text' name='destination' placeholder='Destination' value="<?php echo htmlspecialchars($destination)?>" required></td>
            </tr>

            <br>

            <tr>
                <td> Number of places </td>
                <td> <input type='number' name='number' min="1" max="10" placeholder="0" value="<?php echo (int)$number?>"  required> </td>
            </tr>

            <br>

            <tr>
                <td> Cancelling insurance </td>
                <td> <?php
                    if ($insurance==='true')
                    {?>
                        <input type='checkbox' name='insurance' value=<?php echo $insurance?> checked><?;
                    }
                    else {?>
                                <input type='checkbox' name='insurance' value=<?php echo $insurance?>><?;
                    } ?> </td>
            </tr>
            <br>
        </table>

        <input type='submit' value='Next step'/>
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
