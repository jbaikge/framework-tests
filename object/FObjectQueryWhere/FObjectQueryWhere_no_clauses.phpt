--TEST--
Ensure only the default clauses show.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
var_dump((string)$where);
?>
--EXPECT--
string(0) ""
