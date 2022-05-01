<?php

class DateToIndexMapper{

  // error constant message

  protected $date = '';
  protected $count = 0;

  private $sum = 0;
  private $index = -1;

  public function __construct($conf){

    $this -> date = $conf['date'];
    // count hast to be greater than one
    $this -> count = $conf['count'];
  }

  protected function setDatePartSum(){
    list($day,$month,$year) = explode('-',$this -> date);
    $this -> sum = (int)$day + (int)$month + (int)$year;   
  }

  private function computeIndex(){
    return $this -> index = $this -> sum % $this -> count;
  }

  public function get(){
    $this -> setDatePartSum();
    return $this -> computeIndex(); 
  }
}

?>
