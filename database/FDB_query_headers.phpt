--TEST--
Ensure the result returned from FDB::query()->headers() works.
--FILE--
<?php
require('codeloader.php');
require('config.php'); // Provides $single_config and $master_slave_config

FDB::connect($single_config);

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