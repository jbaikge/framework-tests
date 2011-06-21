--TEST--
Ensure gt (greater than) operator works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('monkey');
$where->add('field', 'gt', array(0));
print($where->toString());
?>
--EXPECT--
  monkey.object_type = 'monkey'
  AND
  monkey.object_deleted = '0'
  AND
  field.attribute_value > '0'
