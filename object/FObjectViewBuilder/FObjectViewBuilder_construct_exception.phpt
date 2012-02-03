--TEST--
Ensure FObjectViewBuilder::__construct tosses an exception when the supplied class is not a subclass of FObject and doesn't implement FObjectDatabaseStorage.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
class Bogus {}

define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FObjectQuery::updateStructure();

$FOVB = new FObjectViewBuilder(new Bogus());
var_dump($FOVB);
?>
--EXPECTF--
Fatal error: Uncaught exception 'InvalidArgumentException' with message 'Object must subclass FObject and implement FObjectDatabaseStorage'%s
