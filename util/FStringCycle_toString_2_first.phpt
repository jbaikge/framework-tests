--TEST--
Ensure Cycle works with two arguments.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

// Setup
$str_first = str_repeat('a', rand(1,10));
$str_second = str_repeat('b', rand(10,20));

// Test Alternating
$cycle_alternate = new FStringCycle($str_first, $str_second);
echo 'First cast to string should yield the first passed string: ';
var_dump((string)$cycle_alternate == $str_first);

echo 'Second cast to string should yield the second passed string: ';
var_dump((string)$cycle_alternate == $str_second);

echo 'Multiple passes to sprintf continue to alternate between strings: ';
var_dump(strlen(sprintf('%s%s%s%s', $cycle_alternate, $cycle_alternate, $cycle_alternate, $cycle_alternate)) == 2 * (strlen($str_first) + strlen($str_second)));
?>
--EXPECT--
First cast to string should yield the first passed string: bool(true)
Second cast to string should yield the second passed string: bool(true)
Multiple passes to sprintf continue to alternate between strings: bool(true)
