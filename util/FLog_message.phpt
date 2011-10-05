--TEST--
Ensure FLog::message() adds messages to the internal data structure.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
if (!FClassCache::classExists('FLog')) {
  print "skip FLog class not available";
}
?>
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

FLog::message(array(
	'severity' => "Low",
	'line' => 34,
	'error' => "Broken."
));

var_dump(FLog::getData());
?>
--EXPECT--
array(1) {
  ["messages"]=>
  array(1) {
    ["e437bcd89675b4722f63c92368b97ea89dc68198"]=>
    array(3) {
      ["severity"]=>
      string(3) "Low"
      ["line"]=>
      int(34)
      ["error"]=>
      string(7) "Broken."
    }
  }
}
