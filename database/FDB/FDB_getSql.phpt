--TEST--
Retrieve processed query.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

var_dump(FDB::sql('SELECT 1 = %d', 1));
var_dump(FDB::query('SELECT 1 = %d', 1)->getSQL());

var_dump(FDB::sql('SELECT 1 = "%s"', 'This has "quotes"'));
var_dump(FDB::sql("SELECT 1 = '%s'", "This has 'quotes'"));
?>
--EXPECT--
string(12) "SELECT 1 = 1"
string(12) "SELECT 1 = 1"
string(32) "SELECT 1 = "This has \"quotes\"""
string(32) "SELECT 1 = 'This has \'quotes\''"
