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
    } catch(Exception $e) {echo "Destination unvalid!".$e->getMessage;}
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
?>
