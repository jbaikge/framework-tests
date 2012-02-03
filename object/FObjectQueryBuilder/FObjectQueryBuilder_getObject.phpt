--TEST--
Ensure FObjectQueryBuilder::getObject returns the object type result of the query.
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
echo $FOQB->getObject();
?>
--EXPECT--
MyBuilderClass
