--TEST--
Ensure eq (equals) operator works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('field', 'eq', array(0));
var_dump((string)$where);
?>
--EXPECT--
string(14) "  field = '0'
"