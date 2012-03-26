--TEST--
Ensure in operator works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('field', 'in', array(0, 1, 2));
var_dump((string)$where);
?>
--EXPECT--
string(21) "  field IN (0, 1, 2)
"
