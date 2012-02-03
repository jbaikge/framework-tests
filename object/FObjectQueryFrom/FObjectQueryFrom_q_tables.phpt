--TEST--
Ensure FObjectQueryFrom queries the q_tables if they are set to be used in the config.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
$config['fobject.qtables'] = true;
require(dirname(__FILE__) . '/../../webroot.conf.php');

$from = new FObjectQueryFrom('MyFromClass');
var_dump((string)$from);
?>
--EXPECT--
string(15) "  q_MyFromClass"
