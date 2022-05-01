<?php

include_once(__DIR__.'/../lib/DateToIndexMapper.php');

use PHPUnit\Framework\TestCase;

/**
 * @covers DateToIndexMapper
 */
final class DateToIndexMapperTest extends TestCase {

  public function testMissingInputArgument(){
    $items = [];
    $date = date('d-m-Y');

    $this->expectException(InvalidArgumentException::class);
    $dtim = new DateToIndexMapper(); 
  }

  public function testInvalidCountArgument(){
    $items = [];
    $date = date('d-m-Y');
    $count = count($items);

    $this->expectException(InvalidArgumentException::class);
    $dtim = new DateToIndexMapper([
      'date' => $date,
      'count' => $count  
    ]); 
  }

  public function testInvalidDateArgument(){
    $items = [];
    $date = date('');
    $count = count($items);

    $this->expectException(InvalidArgumentException::class);
    $dtim = new DateToIndexMapper([
      'date' => $date,
      'count' => $count  
    ]); 
  }

  public function testGet(){
    $items = ['a','b','c','d'];
    $date = date('00-00-0004');
    $count = count($items);

    $dtim = new DateToIndexMapper([
      'date' => $date,
      'count' => $count  
    ]); 

    $this -> assertEquals(0,$dtim -> get());
  }

  public function testGet2(){
    $items = ['a','b','c','d'];
    $date = date('00-00-0007');
    $count = count($items);

    $dtim = new DateToIndexMapper([
      'date' => $date,
      'count' => $count  
    ]); 

    $this -> assertEquals(3,$dtim -> get());
  }

  public function testGet3(){
    $date = date('00-00-0007');

    $dtim = new DateToIndexMapper([
      'date' => $date,
      'count' => 4  
    ]); 

    $this -> assertEquals(4,$dtim -> get(1));
  }

}
