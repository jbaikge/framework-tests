--TEST--
Ensure FDB::connect() works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
$config['database.auto_connect'] = false;

require(dirname(__FILE__) . '/../webroot.conf.php');

FDB::connect();
?>
--EXPECT--
