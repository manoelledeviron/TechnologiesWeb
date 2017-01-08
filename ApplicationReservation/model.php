<?php
//100% php
class Reservation
{
  private $destination="";
  private $number=0;
  private $insurance=false;

  public function __construct($destination,$number,$insurance)
  {
    $this->destination=$destination;
    $this->number=$number;
    $this->insurance=$insurance;
  }

  public function getDestination()
  {
    try {
      return $this->destination;
    } catch(Exception $e) {echo "Destination invalid!".$e->getMessage;}
  }

  public function getNumber()
  {
    try {
      $this->number=(int)$this->number;
      return $this->number;
    } catch (Exception $e) {echo "Not a valid entry!".$e->getMessage;}

  }

  public function getinsurance()
  {
    return $this->insurance;
  }
}

class People
{
    private $lastname="";
    private $firstname="";
    private $age="";

    public function __construct($lastname,$firstname,$age)
    {
        $this->lastname=$lastname;
        $this->firstname=$firstname;
        $this->age=$age;
    }
    public function PrintPeople() {
        return $this->firstname." ".$this->lastname." ".$this->age;
    }
}

function secure($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
