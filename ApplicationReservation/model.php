<?php
//100% php
class Reservation
{
  private $destination="";
  private $number=0;
  private $assurance=false;

  public function __construct($destination,$number,$assurance)
  {
    $this->destination=$destination;
    $this->number=$number;
    $this->assurance=$assurance;
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

  public function getAssurance()
  {
    return $this->assurance;
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
?>