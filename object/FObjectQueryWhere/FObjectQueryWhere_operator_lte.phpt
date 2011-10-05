--TEST--
Ensure lte (less than or equal to) operator works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('field', 'lte', array(0));
var_dump((string)$where);
?>
--EXPECT--
string(15) "  field <= '0'
"