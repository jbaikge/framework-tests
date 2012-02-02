--TEST--
Ensure FDB::connect() tosses exceptions when in master/slave mode.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
$config['database.auto_connect'] = false;
$config['database.master_host'] = 'localhost';
$config['database.master_user'] = 'root';
$config['database.master_pass'] = '';
$config['database.slave_host'] = '127.1.1.1';
$config['database.slave_user'] = 'root';
$config['database.slave_pass'] = '';
$config['database.name'] = 'test';

require_once(dirname(__FILE__) . '/../webroot.conf.php');
FDB::connect();
?>
--EXPECTF--
Warning: mysqli::mysqli(): (HY000/2003): Can't connect to MySQL server on %s

Fatal error: Uncaught exception 'Exception' with message 'Could not connect to slave database:%s
