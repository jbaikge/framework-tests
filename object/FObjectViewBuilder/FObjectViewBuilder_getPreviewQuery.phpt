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
(id, parent_id, creator_id, builder_field, cast_field, _added, _updated)
AS
SELECT MyBuilderClass.object_id, 
  MyBuilderClass.object_parent_id, 
  MyBuilderClass.object_creator_id, 
  COALESCE(ap_builder_field.attribute_value, a_builder_field.attribute_value), 
  CAST(COALESCE(ap_cast_field.attribute_value, a_cast_field.attribute_value) AS CHAR(32)), 
  MyBuilderClass.object_added, 
  GREATEST(IFNULL(COALESCE(ap_builder_field.attribute_added, a_builder_field.attribute_added), '0000-00-00'), IFNULL(COALESCE(ap_cast_field.attribute_added, a_cast_field.attribute_added), '0000-00-00'))
FROM objects AS MyBuilderClass
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
  LEFT JOIN attributes AS a_cast_field ON (
    a_cast_field.object_id = MyBuilderClass.object_id
    AND a_cast_field.attribute_key = 'cast_field'
    AND a_cast_field.attribute_archived = 0
    AND a_cast_field.attribute_preview = 0
  )
  LEFT JOIN attributes AS ap_cast_field ON (
    ap_cast_field.object_id = MyBuilderClass.object_id
    AND ap_cast_field.attribute_key = 'cast_field'
    AND ap_cast_field.attribute_archived = 0
    AND ap_cast_field.attribute_preview = 1
  )
WHERE
  object_deleted = 0
  AND object_type = 'MyBuilderClass'
