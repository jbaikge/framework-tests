--TEST--
Ensure only the default clauses show.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../webroot.conf.php');

$where = new FObjectQueryWhere('monkey');
print($where->toString());
?>
--EXPECT--
  monkey.object_type = 'monkey'
  AND
  monkey.object_deleted = '0'
