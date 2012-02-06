--TEST--
Ensure String::endsWith() works with case insensitivity.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$str = 'Lorem ipsum';
$upper_str = strtoupper($str);
$good_letter = 'm';
$good_str = 'psum';
$bad_letter = 'q';
$bad_str = 'em ip';

$tests = array(
	"'$str' ends with '$good_letter'" => array($str, $good_letter),
	"'$str' ends with '$good_str'" => array($str, $good_str),
	"'$str' does not end with '$bad_letter'" => array($str, $bad_letter),
	"'$str' does not end with '$bad_str'" => array($str, $bad_str),
	"'$upper_str' ends with '$good_letter'" => array($str, $good_letter),
	"'$upper_str' ends with '$good_str'" => array($str, $good_str),
	"'$upper_str' does not end with '$bad_letter'" => array($str, $bad_letter),
);

foreach ($tests as $desc => $args) {
	echo "$desc: ";
	var_dump(FString::endsWith($args[0], $args[1], true));
}
?>
--EXPECT--
'Lorem ipsum' ends with 'm': bool(true)
'Lorem ipsum' ends with 'psum': bool(true)
'Lorem ipsum' does not end with 'q': bool(false)
'Lorem ipsum' does not end with 'em ip': bool(false)
'LOREM IPSUM' ends with 'm': bool(true)
'LOREM IPSUM' ends with 'psum': bool(true)
'LOREM IPSUM' does not end with 'q': bool(false)
