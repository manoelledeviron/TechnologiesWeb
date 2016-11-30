<?php
class Traitement
{
  public function reservation($dest,$number,$assurance)
  {
    $_SESSION['destination']=$dest;
    $_SESSION['number']=$number;
    if (isset($_POST['assurance']))
    {$_SESSION['assurance']='Yes';}
    else
    {$_SESSION['assurance']='No';}
  }

  function validation($names,$ages)
  {
    $_SESSION['names']=$names;
    $_SESSION['ages']=$ages;

    for ($i=0;$i<$number;$i++)
    {
      echo $i;
      $_SESSION['people']=Person($name,$age);
      //$_SESSION['names']=$_SESSION['names']+ $_REQUEST[${'name'.$i}]+";";
      //$_SESSION['ages']= $_SESSION['ages']+ $_REQUEST[${'age'.$i}]+";";
    }
  }

}
?>
