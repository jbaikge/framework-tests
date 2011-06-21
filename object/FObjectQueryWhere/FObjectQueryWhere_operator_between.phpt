--TEST--
Ensure BETWEEN operator works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('monkey');
$where->add('field', 'between', array(0, 1));
print($where->toString());
?>
--EXPECT--
  monkey.object_type = 'monkey'
  AND
  monkey.object_deleted = '0'
  AND
  field.attribute_value BETWEEN '0' AND '1'
