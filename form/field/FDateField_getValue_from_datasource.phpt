--TEST--
Ensure FDateField::getValue() returns the unix timestamp stored in the data source.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FDateField('test');
// Simulate loading stored unix timestamps from datasource.
$field->load(1325422800);
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getValue());
?>
--EXPECT--
bool(true)
int(1325422800)
int(1325422800)
