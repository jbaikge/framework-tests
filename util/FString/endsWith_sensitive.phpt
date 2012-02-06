--TEST--
Ensure String::endsWith() works with case sensitivity.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$str = 'Lorem Ipsum';
$upper_str = strtoupper($str);
$good_letter = 'm';
$good_str = 'Ipsum';
$bad_letter = 'q';
$bad_str = 'ipsum';

$tests = array(
	"'$str' ends with '$good_letter'" => array($str, $good_letter),
	"'$str' ends with '$good_str'" => array($str, $good_str),
	"'$str' does not end with '$bad_letter'" => array($str, $bad_letter),
	"'$str' does not end with '$bad_str'" => array($str, $bad_str)
);
foreach ($tests as $desc => $args) {
	echo "$desc: ";
	var_dump(FString::endsWith($args[0], $args[1]));
}
?>
--EXPECT--
'Lorem Ipsum' ends with 'm': bool(true)
'Lorem Ipsum' ends with 'Ipsum': bool(true)
'Lorem Ipsum' does not end with 'q': bool(false)
'Lorem Ipsum' does not end with 'ipsum': bool(false)
