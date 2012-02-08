--TEST--
Ensure FObjectQueryWhere::add properly triggers the Maximum arguments exception.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('field1', 'eq', array('good','bad'));
var_dump((string)$where);
?>
--EXPECTF--
Fatal error: Uncaught exception 'FObjectQueryMaxArgsException' with message %s
