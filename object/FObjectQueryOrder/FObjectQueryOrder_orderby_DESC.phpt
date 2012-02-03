--TEST--
Ensure FObjectQueryOrder::_orderBy accepts DESC and builds appropriate clause.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$order = FObjectQuery::select('MyOrderClass')->_orderBy('text_field', 'DESC');
var_dump((string)$order);
?>
--EXPECT--
string(55) "SELECT *
FROM
  v_MyOrderClass
ORDER BY
text_field DESC"
