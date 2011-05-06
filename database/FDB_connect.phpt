--TEST--
Ensure FDB::connect() works.
--FILE--
<?php
define('DATABASE', 'single');
$config['database.auto_connect'] = false;

require(dirname(__FILE__) . '/../webroot.conf.php');

FDB::connect();
?>
--EXPECT--
