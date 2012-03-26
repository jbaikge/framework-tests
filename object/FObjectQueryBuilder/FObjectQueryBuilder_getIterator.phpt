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
var_dump(get_class($FOQB->getIterator()));
?>
--EXPECTF--
string(13) "FMySQLiResult"
 
