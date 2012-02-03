--TEST--
Ensure FObjectViewBuilder::getPreviewQuery returns the SQL to query the view table containing preview data.
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
echo $FOVB->getPreviewQuery();
?>
--EXPECT--
CREATE OR REPLACE VIEW vp_MyBuilderClass
(id, parent_id, creator_id, builder_field, _added, _updated)
AS
SELECT MyBuilderClass.object_id, 
  MyBuilderClass.object_parent_id, 
  MyBuilderClass.object_creator_id, 
  COALESCE(ap_builder_field.attribute_value, a_builder_field.attribute_value), 
  MyBuilderClass.object_added, 
  COALESCE(ap_builder_field.attribute_added, a_builder_field.attribute_added)
FROM objects AS MyBuilderClass
LEFT JOIN object_caches USING(object_id)
  LEFT JOIN attributes AS a_builder_field ON (
    a_builder_field.object_id = MyBuilderClass.object_id
    AND a_builder_field.attribute_key = 'builder_field'
    AND a_builder_field.attribute_archived = 0
    AND a_builder_field.attribute_preview = 0
  )
  LEFT JOIN attributes AS ap_builder_field ON (
    ap_builder_field.object_id = MyBuilderClass.object_id
    AND ap_builder_field.attribute_key = 'builder_field'
    AND ap_builder_field.attribute_archived = 0
    AND ap_builder_field.attribute_preview = 1
  )
WHERE
  object_deleted = 0
  AND object_type = 'MyBuilderClass'