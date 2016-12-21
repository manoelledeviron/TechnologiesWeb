<?php
/**
 * Created by PhpStorm.
 * User: manoelledeviron
 * Date: 29/11/2016
 * Time: 21:55
 */

class Database
{
    private $host;
    private $user;
    private $password;
    private $database;

    //Creating the Database object
    public function __construct($database="ApplicationReservations",$host="localhost",$user="root",$password="root")
    {
        $this->host=$host;
        $this->user=$user;
        $this->password=$password;
        $this->database=$database;
    }

    //Opens the Database, from a Database object
    public function OpenDatabase($database) {
        $mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);

        if (!$mysqli)
        {
            die('mysqli_init failed! ');
        }

        if (!$mysqli->real_connect('localhost', $this->user, $this->password, $this->database)) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        return $mysqli;


    }

    //Adding a reservation to the Database ReservationsComplete(ResID,DestID,Assurance) => Auto-Increment of the ResID
    public function AddReservation($database,$destination,$assurance) {
        $mysql="INSERT INTO ReservationsComplete(Destination,Assurance) VALUES ('$destination',$assurance)";
        $sql=$database->query($mysql);
        if (!$sql)
        {
            echo "Error: " . $sql . "<br>" . $database->error;
        }
        return $sql;
    }

    //Adding a person to the Database people(FirstName,LastName,Age,ResID)
    public function AddPeople($lastname,$firstname,$age,$database,$resID) {
        $sql="INSERT INTO people(FirstName,LastName,Age,ResID) VALUES('$firstname','$lastname',$age,$resID)";
        $result=$database->query($sql);
        return $result;
    }

    //Selecting an entire Table
    public function Select2($db,$look,$table)
    {
        $result=$db->query("SELECT $look FROM $table");
        return $result;
    }

    //Selecting some rows with (name column)=(compare)
    public function Select($db,$look,$table,$column,$compare)
    {
        if (is_string($compare)) {
            $result=$db->query("SELECT $look FROM $table WHERE $column LIKE '$compare'");
        }
        elseif (is_int($compare))
        {
            $result=$db->query("SELECT $look FROM $table where $column=$compare");
        }
        else {
            foreach ($compare as $value)
            {
                if (is_int($value)==true)
                {
                    $result=$db->query("SELECT $look FROM $table where $column=$value");
                }
                else
                {
                    $result=$db->query("SELECT $look FROM $table WHERE $column LIKE '$value'");
                }
            }
        }

        return $result;
    }

    //Inserting a row (column=>value) in a Database
    public function Insert($db,$table,$column,$value) {
        $test=$db->query("INSERT INTO $table($column) VALUES ('$value')");
        return $test;
    }

    //Closing the Database
    public function CloseDatabase($database) {
        mysqli_close($database);
    }
}
?>