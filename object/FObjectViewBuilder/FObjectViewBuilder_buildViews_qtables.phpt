--TEST--
Ensure FObjectViewBuilder::buildViews executes queries to build the view q "tables".
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$_ENV['config']['fobject.qtables'] = true;

FObjectQuery::updateStructure();
MyBuilderClass::setup();
$FOVB = new FObjectViewBuilder(new MyBuilderClass());
$FOVB->buildViews();
var_dump(FDB::query("SHOW TABLES LIKE 'q_MyBuilderClass'")->count());
?>
--EXPECT--
int(1)
