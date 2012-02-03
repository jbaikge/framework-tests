--TEST--
Ensure FObjectQueryWhere::_endGroup properly closes WHERE statement sub-clauses.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
$where->_startGroup();
$where->add('field', 'eq', array(0));
$where->_endGroup();
var_dump((string)$where);
?>
--EXPECT--
string(24) "  (
    field = '0'
  )
"
