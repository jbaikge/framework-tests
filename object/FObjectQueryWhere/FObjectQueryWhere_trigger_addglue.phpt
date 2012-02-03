--TEST--
Ensure FObjectQueryWhere::add properly triggers the addGlue() method when a "glue" keyword is present.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('and field', 'regexp', array(0));
var_dump((string)$where);
?>
--EXPECT--
string(23) "  and field REGEXP '0'
"
