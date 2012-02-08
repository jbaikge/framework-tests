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
$where->add('field1', 'eq', array('good'));
$where->add('field2', 'eq', array('bad'));
var_dump((string)$where);
?>
--EXPECT--
string(41) "  field1 = 'good'
  AND
  field2 = 'bad'
"
