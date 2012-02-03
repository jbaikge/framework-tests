--TEST--
Ensure FDB::connect() tosses exceptions when in single server mode.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
$config['database.auto_connect'] = false;
$config['database.host'] = '127.1.1.1';
$config['database.user'] = 'root';
$config['database.pass'] = '';
$config['database.name'] = 'test';

require_once(dirname(__FILE__) . '/../../webroot.conf.php');
FDB::connect();
?>
--EXPECTF--
Warning: mysqli::mysqli(): (HY000/2003): Can't connect to MySQL server on %s

Fatal error: Uncaught exception 'Exception' with message 'Could not connect to database:%s
