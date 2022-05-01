<?php

include_once(__DIR__.'/../lib/DateToIndexMapper.php');

use PHPUnit\Framework\TestCase;

/**
 * @covers Meta
 */
final class DateToIndexMapperTest extends TestCase {
  public function testCountZero(){
    $this -> assertEquals(1,1);
  }
}
