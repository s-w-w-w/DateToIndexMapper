<?php
/*
  DateToIndexMapper - Map a date to an index of an array
  
  Configuarion:
    date : string - date given in the format dd-mm-yyyy 
    count : integer > 0 - count of items in the array

  Usage: 
    $arr = ['a','b','c','d'];
    $date = date('00-00-0007');
    $count = count($arr);

    $dtim = new DateToIndexMapper([
      'date' => $date,
      'count' => $count  
    ]); 

    // get index (starting from 0th index)
    $dtim -> get();
    => 3

    If argument startWith of get() is set to 1,  count will start from 1 (useful for database table item ids as it will return the id rather than index). 
*/

class DateToIndexMapper{

  const INPUT_ERROR_COUNT_LESS_THAN_ONE = 'Argument count must be an integer greater than 0';
  const INPUT_ERROR_DATE_INVALID_FORMAT = 'Argument date must be in dd-mm-yyyy format.';
  const INPUT_ERROR_ARGUMENT_MISSING = 'Required input argument(s) missing.';

  protected $date = '';
  protected $count = 0;

  private $sum = 0;
  private $index = -1;

  public function __construct($conf = []){

    $classname = static::class; 
    $count = ''; 

    // validate input and set instance properties 
    
    if(!isset($conf['date']) or !isset($conf['count'])){
      throw new InvalidArgumentException("${classname} : " . self::INPUT_ERROR_ARGUMENT_MISSING);
    }

    $count = (int)$conf['count'];

    if(preg_match('/^\d{2}-\d{2}-\d{4}$/',$conf['date']) !== 1){
      throw new InvalidArgumentException("${classname} : " . self::INPUT_ERROR_DATE_INVALID_FORMAT);
    }

    if($count < 1){
      throw new InvalidArgumentException("${classname} : " . self::INPUT_ERROR_COUNT_LESS_THAN_ONE);
    }

    $this -> date = $conf['date'];  
    $this -> count = $count;
  }

  private function setDatePartSum(){
    list($day,$month,$year) = explode('-',$this -> date);
    $this -> sum = (int)$day + (int)$month + (int)$year;   
  }

  private function computeIndex(){
    return $this -> index = $this -> sum % $this -> count;
  }

  // startWith = 0 - first index is 0 (arrays), 1 - database ids 
  public function get($startWith = 0){
    $this -> setDatePartSum();
    return $this -> computeIndex() + $startWith; 
  }
}

?>
