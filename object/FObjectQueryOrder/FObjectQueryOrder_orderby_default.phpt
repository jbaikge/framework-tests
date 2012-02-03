--TEST--
Ensure FObjectQueryOrder::_orderBy builds appropriate ASC clause when the direction parameter is not passed in.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$order = FObjectQuery::select('MyOrderClass')->_orderBy('text_field');
var_dump((string)$order);
?>
--EXPECT--
string(54) "SELECT *
FROM
  v_MyOrderClass
ORDER BY
text_field ASC"
