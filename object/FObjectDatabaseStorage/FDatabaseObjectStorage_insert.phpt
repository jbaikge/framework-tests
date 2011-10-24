--TEST--
Ensure FObjectDatabaseStorage::insert() works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FDB::query("TRUNCATE objects");

$o = new MyStorageObject();

$o->first_name = 'Test';
$o->last_name = 'Testerly';

$o->update();

$objects = FDB::query("SELECT object_id, object_type FROM objects")->asAssoc();
$attributes = FDB::query("SELECT attribute_key, attribute_value FROM attributes ORDER BY attribute_key")->asAssoc();

var_dump(
	iterator_to_array($objects),
	iterator_to_array($attributes)
);

?>
--EXPECT--
array(1) {
  [0]=>
  array(2) {
    ["object_id"]=>
    string(1) "1"
    ["object_type"]=>
    string(15) "MyStorageObject"
  }
}
array(4) {
  [0]=>
  array(2) {
    ["attribute_key"]=>
    string(10) "first_name"
    ["attribute_value"]=>
    string(4) "Test"
  }
  [1]=>
  array(2) {
    ["attribute_key"]=>
    string(9) "last_name"
    ["attribute_value"]=>
    string(8) "Testerly"
  }
  [2]=>
  array(2) {
    ["attribute_key"]=>
    string(8) "password"
    ["attribute_value"]=>
    string(0) ""
  }
  [3]=>
  array(2) {
    ["attribute_key"]=>
    string(4) "salt"
    ["attribute_value"]=>
    string(0) ""
  }
}
