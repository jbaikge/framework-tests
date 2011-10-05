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

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('field', 'between', array(0, 1));
var_dump((string)$where);
?>
--EXPECT--
string(28) "  field BETWEEN '0' AND '1'
"
