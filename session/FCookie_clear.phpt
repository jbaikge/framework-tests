--TEST--
Ensure FCookie clears cookie values.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

FCookie::initialize();
FCookie::set('test', 'value');
var_dump(FCookie::get('test'));
FCookie::clear();
var_dump(FCookie::get('test'));
?>
--EXPECT--
string(5) "value"
NULL
