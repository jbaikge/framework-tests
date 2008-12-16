--TEST--
Ensure FTemplate::fetchCached() works.
--FILE--
<?php
require('codeloader.php');

var_dump(FTemplate::fetchCached('templates/test.html.php'));

var_dump(@FTemplate::fetchCached('templates/bunk.html.php'));

$a = 1;
$b = 2;
$c = 3;
var_dump(FTemplate::fetchCached('templates/test.html.php'));

$b = 4;
var_dump(FTemplate::fetchCached('templates/test.html.php'));
?>
--EXPECT--
string(55) "Value of $a: <br>
Value of $b: <br>
Value of $c: <br>

"
string(0) ""
string(58) "Value of $a: 1<br>
Value of $b: 2<br>
Value of $c: 3<br>

"
string(58) "Value of $a: 1<br>
Value of $b: 4<br>
Value of $c: 3<br>

"
