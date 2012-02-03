--TEST--
Ensure FObjectViewBuilder::getWhereClause returns the where statment portion of a query referring to the preview data view table.
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
$FOVB->buildViews();
echo $FOVB->getWhereClause(true);
?>
--EXPECT--
WHERE
  object_deleted = 0
  AND object_type = 'MyBuilderClass'
