--TEST--
Ensure FObjectQueryFrom returns single attribute join when preview mode is off.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$from = new FObjectQueryFrom('monkey');
$from->add('hands', array());
$from->add('feet', array());
$from->preview(true);
print($from->toString());
?>
--EXPECT--
  objects AS monkey
  LEFT JOIN object_attributes AS hands ON (
    hands.object_id = monkey.object_id
    AND hands.attribute_key = 'hands'
    AND hands.attribute_archived = 0
    AND hands.attribute_preview = 0
  )
  LEFT JOIN object_attributes AS hands_p ON (
    hands_p.object_id = monkey.object_id
    AND hands_p.attribute_key = 'hands'
    AND hands_p.attribute_archived = 0
    AND hands_p.attribute_preview = 1
  )
  LEFT JOIN object_attributes AS feet ON (
    feet.object_id = monkey.object_id
    AND feet.attribute_key = 'feet'
    AND feet.attribute_archived = 0
    AND feet.attribute_preview = 0
  )
  LEFT JOIN object_attributes AS feet_p ON (
    feet_p.object_id = monkey.object_id
    AND feet_p.attribute_key = 'feet'
    AND feet_p.attribute_archived = 0
    AND feet_p.attribute_preview = 1
  )
