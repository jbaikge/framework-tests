--TEST--
Ensure FObject::unserialize() returns JSON-encoded data
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}

$object = unserialize('C:8:"MyObject":37:{{"int":4,"string":"hi","array":[1,2]}}');
var_dump($object->getData());
?>
--EXPECT--
array (3) {
  ["int"]=>
  int(4)
  ["string"]=>
  string(2) "hi"
  ["array"]=>
  array(2) {
    [0]=>
    int(1)
    [1]=>
    int(2)
  }
}
