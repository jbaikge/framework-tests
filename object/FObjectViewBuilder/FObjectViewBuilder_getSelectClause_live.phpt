--TEST--
Ensure FObjectViewBuilder::getSelectClause returns the select statment portion of a query referring to the live data view table.
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
echo $FOVB->getSelectClause();
?>
--EXPECTF--
SELECT MyBuilderClass.object_id, 
  MyBuilderClass.object_parent_id, 
  MyBuilderClass.object_creator_id, 
  a_builder_field.attribute_value, 
  CAST(a_cast_field.attribute_value AS CHAR(32)), 
  MyBuilderClass.object_added, 
  GREATEST(IFNULL(a_builder_field.attribute_added, '%s'), IFNULL(a_cast_field.attribute_added, '%s'))
