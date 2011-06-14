--TEST--
Ensure the result returned from FDB::query()->headers() works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../webroot.conf.php');

$result = FDB::query('SELECT 1 AS val1, 2 AS val2 UNION SELECT 3, 4');
var_dump($result->num_rows);

// Row Headers
var_dump($result->asRow()->headers());

// Associative Headers
var_dump($result->asAssoc()->headers());

// Object Headers
var_dump($result->asObject()->headers());

// CSV Headers
var_dump($result->asCSV()->headers());
?>
--EXPECTF--
int(2)
array(2) {
  [0]=>
  string(4) "val1"
  [1]=>
  string(4) "val2"
}
array(2) {
  [0]=>
  string(4) "val1"
  [1]=>
  string(4) "val2"
}
array(2) {
  [0]=>
  string(4) "val1"
  [1]=>
  string(4) "val2"
}
string(10) "val1,val2
"