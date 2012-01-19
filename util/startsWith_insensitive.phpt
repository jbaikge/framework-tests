--TEST--
Ensure String::startsWith() works with case insensitivity.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$str = 'Lorem ipsum';
$upper_str = strtoupper($str);
$good_letter = 'L';
$good_str = 'Lore';
$bad_letter = 'q';
$bad_str = 'ipsum';

$tests = array(
	"'$str' starts with '$good_letter'" => array($str, $good_letter),
	"'$str' starts with '$good_str'" => array($str, $good_str),
	"'$str' does not start with '$bad_letter'" => array($str, $bad_letter),
	"'$str' does not start with '$bad_str'" => array($str, $bad_str),
	"'$upper_str' starts with '$good_letter'" => array($str, $good_letter),
	"'$upper_str' starts with '$good_str'" => array($str, $good_str),
	"'$upper_str' does not start with '$bad_letter'" => array($str, $bad_letter),
);

foreach ($tests as $desc => $args) {
	echo "$desc: ";
	var_dump(FString::startsWith($args[0], $args[1], true));
}
?>
--EXPECT--
'Lorem ipsum' starts with 'L': bool(true)
'Lorem ipsum' starts with 'Lore': bool(true)
'Lorem ipsum' does not start with 'q': bool(false)
'Lorem ipsum' does not start with 'ipsum': bool(false)
'LOREM IPSUM' starts with 'L': bool(true)
'LOREM IPSUM' starts with 'Lore': bool(true)
'LOREM IPSUM' does not start with 'q': bool(false)
