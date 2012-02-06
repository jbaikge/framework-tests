--TEST--
Ensure Cycle works with three arguments.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

// Setup
$str_first = str_repeat('a', rand(1,10));
$str_second = str_repeat('b', rand(10,20));
$str_third = str_repeat('c', rand(20,30));

// Test Triples
$cycle_triple = new FStringCycle($str_first, $str_second, $str_third);
echo 'First cast to string should yield the first passed string: ';
var_dump((string)$cycle_triple == $str_first);

echo 'Second cast to string should yield the second passed string: ';
var_dump((string)$cycle_triple == $str_second);

echo 'Third cast to string should yield the third passed string: ';
var_dump((string)$cycle_triple == $str_third);

echo 'Multiple passes to sprintf continue to alternate between strings: ';
var_dump(strlen(sprintf('%s%s%s%s%s%s', $cycle_triple, $cycle_triple, $cycle_triple, $cycle_triple, $cycle_triple, $cycle_triple)) == 2 * (strlen($str_first) + strlen($str_second) + strlen($str_third)));
?>
--EXPECT--
First cast to string should yield the first passed string: bool(true)
Second cast to string should yield the second passed string: bool(true)
Third cast to string should yield the third passed string: bool(true)
Multiple passes to sprintf continue to alternate between strings: bool(true)
