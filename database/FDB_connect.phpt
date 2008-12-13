--TEST--
Ensure FDB::connect() works.
--FILE--
<?php
require('codeloader.php');
require('config.php'); // Defines $single_config and $master_slave_config
FDB::connect($config);
?>
--EXPECT--
