--TEST--
Ensure the result returned from FDB::query() works.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../webroot.conf.php');

$result = FDB::query('SELECT 1 AS val1, 2 AS val2 UNION SELECT 3, 4');
var_dump($result->num_rows);

// Default row type: Object
foreach ($result as $row => $data) {
	var_dump($row, $data);
}

// Associative Arrays
foreach ($result->asAssoc() as $row => $data) {
	var_dump($row, $data);
}

// Keyless Arrays
foreach ($result->asRow() as $row => $data) {
	var_dump($row, $data);
}

// Objects
foreach ($result->asObject() as $row => $data) {
	var_dump($row, $data);
}
?>
--EXPECTF--
int(2)
int(0)
object(stdClass)#%d (2) {
  ["val1"]=>
  string(1) "1"
  ["val2"]=>
  string(1) "2"
}
int(1)
object(stdClass)#%d (2) {
  ["val1"]=>
  string(1) "3"
  ["val2"]=>
  string(1) "4"
}
int(0)
array(2) {
  ["val1"]=>
  string(1) "1"
  ["val2"]=>
  string(1) "2"
}
int(1)
array(2) {
  ["val1"]=>
  string(1) "3"
  ["val2"]=>
  string(1) "4"
}
int(0)
array(2) {
  [0]=>
  string(1) "1"
  [1]=>
  string(1) "2"
}
int(1)
array(2) {
  [0]=>
  string(1) "3"
  [1]=>
  string(1) "4"
}
int(0)
object(stdClass)#%d (2) {
  ["val1"]=>
  string(1) "1"
  ["val2"]=>
  string(1) "2"
}
int(1)
object(stdClass)#%d (2) {
  ["val1"]=>
  string(1) "3"
  ["val2"]=>
  string(1) "4"
}
