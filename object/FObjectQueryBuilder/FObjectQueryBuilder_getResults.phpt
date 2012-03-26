--TEST--
Ensure FObjectQueryBuilder::getResults returns an iterator reference to the query results.
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
var_dump(get_class($FOQB->getResults()));
?>
--EXPECTF--
string(13) "FMySQLiResult"
