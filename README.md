# Slicer

DateToIndexMapper - Map a date to an index of an array

## Description
  DateToIndexMapper is a PHP library for mapping dates to an index of an array.

## Installation
  Copy DateToIndexMapper.php file in a folder where PHP can find it. You might need to add a namespace in the file.

## Configuration

### Configuration options
DateToIndexMapper library can be configured using an associative array of parameters (all parameters are required): 

**date** - String - date given in the format dd-mm-yyyy, 

**count** - integer > 0 - count of items in the array,

```php
$conf = [
  'date' => "22-08-1993", 
  'count' => 3
];
```

## Usage
Usage examples:

```php

    // array of items
    $arr = ['a','b','c','d'];
    // date to map to an index of the array
    $date = date('00-00-0007');
    // count of items in the array
    $count = count($arr);

    // instance
    $dtim = new DateToIndexMapper([
      'date' => $date,
      'count' => $count  
    ]); 

    // get index in the array
    $dtim -> get();
    => 3

```

