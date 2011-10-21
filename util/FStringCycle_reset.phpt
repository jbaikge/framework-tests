--TEST--
Ensure FStringCycle::reset() works/
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$c = new FStringCycle(1, 2, 3, 4, 5);

echo $c, $c, $c, $c;
echo $c->reset();
echo $c, $c, $c, $c;

?>
--EXPECT--
12341234
