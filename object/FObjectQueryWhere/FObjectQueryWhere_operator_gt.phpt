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

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('field', 'gt', array(0));
var_dump((string)$where);
?>
--EXPECT--
string(14) "  field > '0'
"
