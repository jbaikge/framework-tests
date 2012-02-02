--TEST--
Ensure FEmailField creates its dynamic error message if the field fails validation.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FEmailField('test');
$field->load('joe@test,com');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECTF--
bool(false)
string(36) "Invalid E-Mail address: %s"
string(36) "Invalid E-Mail address: %s"
