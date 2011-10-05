--TEST--
Ensure 
--SKIPIF--
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FObjectQuery::updateStructure();
FDB::query("TRUNCATE objects");
FDB::query("TRUNCATE attributes");

$o = new MyStorageObject();
$o->first_name = 'Test';
$o->last_name = 'Testerly';
$o->random_field = 'Random';
$o->update();

unset($o);

$o1 = new MyStorageObject(1);
var_dump($o1->getData());

?>
--EXPECT--
array(4) {
  ["first_name"]=>
  string(4) "Test"
  ["last_name"]=>
  string(8) "Testerly"
  ["password"]=>
  NULL
  ["salt"]=>
  NULL
}
