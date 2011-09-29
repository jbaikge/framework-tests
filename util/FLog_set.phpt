--TEST--
Ensure FLog::set() sets a key and value properly.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

FLog::set('foo', 'bar');
var_dump(FLog::getData());
?>
--EXPECT--
array(1) {
  ["foo"]=>
  string(3) "bar"
}
