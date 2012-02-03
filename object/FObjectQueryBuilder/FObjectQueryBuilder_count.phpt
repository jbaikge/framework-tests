--TEST--
Ensure FObjectQueryBuilder::count returns the number of rows in a query result.
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
var_dump($FOQB->count());
?>
--EXPECTF--
int(%d)
