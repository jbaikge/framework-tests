--TEST--
Ensure FObjectViewBuilder::getLiveQuery returns the SQL to query the view table containing non-preview data.
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
echo $FOVB->getLiveQuery();
?>
--EXPECT--
CREATE OR REPLACE VIEW v_MyBuilderClass
(id, parent_id, creator_id, builder_field, _added, _updated)
AS
SELECT MyBuilderClass.object_id, 
  MyBuilderClass.object_parent_id, 
  MyBuilderClass.object_creator_id, 
  a_builder_field.attribute_value, 
  MyBuilderClass.object_added, 
  a_builder_field.attribute_added
FROM objects AS MyBuilderClass
LEFT JOIN object_caches USING(object_id)
  LEFT JOIN attributes AS a_builder_field ON (
    a_builder_field.object_id = MyBuilderClass.object_id
    AND a_builder_field.attribute_key = 'builder_field'
    AND a_builder_field.attribute_archived = 0
    AND a_builder_field.attribute_preview = 0
  )
WHERE
  object_deleted = 0
  AND object_type = 'MyBuilderClass'
  AND object_caches.cache IS NOT NULL