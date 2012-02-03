--TEST--
Ensure FObjectQueryOrder::_orderBy does not duplicate the clause when identical clause parameters are supplied.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$order = FObjectQuery::select('MyOrderClass')->_orderBy('text_field', 'DESC')->_orderBy('text_field');
var_dump((string)$order);
?>
--EXPECT--
string(54) "SELECT *
FROM
  v_MyOrderClass
ORDER BY
text_field ASC"
