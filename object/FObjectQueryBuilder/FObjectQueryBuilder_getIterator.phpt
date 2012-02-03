--TEST--
Ensure FObjectQueryBuilder::getIterator returns a reference to the query result iterator object.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FObjectQuery::updateStructure();
MyBuilderClass::setup();
$FOQB = FObjectQuery::select('MyBuilderClass');
var_dump($FOQB->getIterator());
?>
--EXPECTF--
object(FMySQLiResult)#%d (5) {
  ["current_field"]=>
  int(0)
  ["field_count"]=>
  int(%d)
  ["lengths"]=>
  NULL
  ["num_rows"]=>
  int(%d)
  ["type"]=>
  int(0)
}
