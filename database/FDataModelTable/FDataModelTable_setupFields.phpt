--TEST--
Ensure FDataModelTable constructs properly when passed an empty array.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$model = new FDataModelTable('test_table', array());
$model->getCreate();
$model->setupFields();
var_dump(true)
?>
--EXPECT--
bool(true)
