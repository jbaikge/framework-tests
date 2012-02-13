<?php
define('DATABASE', 'single');
require_once(dirname(__FILE__) . '/webroot.conf.php');
// Kill the test database so it's clean the next time we test
FDB::query("DROP DATABASE IF EXISTS test");

