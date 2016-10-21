<?php
class reservation
{
  private $destination;
  private $number;

  public function __construct($destination,$number)
  {
    $this->destination=$destination;
    $this->number=$number;
    $this->names="";
  }

  public function getDestination()
  {
    return $this->destination;
  }

  public function getNumber()
  {
    return $this->number;
  }
  public function addName($name)
  {
    $this->names= $this->names+new person()+";";
    return $this->names;
  }

}

class person
{
  private $name;
  private $age;

  public function __construct($name,$age)
  {
    $this->name=$name;
    $this->age=$age;
  }
}

?>
