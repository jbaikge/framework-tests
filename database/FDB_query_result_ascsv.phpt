--TEST--
Ensure the result returned from FDB::query()->asCSV() works.
--FILE--
<?php
require('codeloader.php');
require('config.php'); // Provides $single_config and $master_slave_config

FDB::connect($single_config);

$result = FDB::query('SELECT 1 AS val1, 2 AS val2 UNION SELECT 3, 4');
var_dump($result->num_rows);

// Default row type: Object
foreach ($result as $row => $data) {
	var_dump($row, $data);
}

// CSV
foreach ($result->asCSV() as $row => $data) {
	var_dump($row, $data);
}

?>
--EXPECTF--
int(2)
int(0)
object(stdClass)#4 (2) {
  ["val1"]=>
  string(1) "1"
  ["val2"]=>
  string(1) "2"
}
int(1)
object(stdClass)#5 (2) {
  ["val1"]=>
  string(1) "3"
  ["val2"]=>
  string(1) "4"
}
int(0)
string(4) "1,2
"
int(1)
string(4) "3,4
"
