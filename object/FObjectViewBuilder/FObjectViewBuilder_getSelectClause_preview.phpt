--TEST--
Ensure FObjectViewBuilder::getSelectClause returns the select statment portion of a query referring to the preview data view table.
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
echo $FOVB->getSelectClause(true);
?>
--EXPECT--
SELECT MyBuilderClass.object_id, 
  MyBuilderClass.object_parent_id, 
  MyBuilderClass.object_creator_id, 
  COALESCE(ap_builder_field.attribute_value, a_builder_field.attribute_value), 
  MyBuilderClass.object_added, 
  COALESCE(ap_builder_field.attribute_added, a_builder_field.attribute_added)
