--TEST--
Ensure FObjectViewBuilder::viewExists returns true when a view table for the supplied object exists in the database.
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
$FOVB = new FObjectViewBuilder(new MyBuilderClass());
var_dump($FOVB->viewExists());
?>
--EXPECTF--
bool(true)
