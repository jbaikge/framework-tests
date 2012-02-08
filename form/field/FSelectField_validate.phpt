--TEST--
Ensure FSelectField validates properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FSelectField('password');
$field->options(array(1=>'value 1', 2=>'value 2'));
$field->load(2);
list ($valid, $value) = $field->validate();
var_dump($valid, $value);
?>
--EXPECT--
bool(true)
string(1) "2"
