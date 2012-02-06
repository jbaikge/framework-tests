--TEST--
Ensure FCookie sets and returns values properly.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

FCookie::initialize();
FCookie::set('test', 'value');
var_dump(FCookie::get('test'));
?>
--EXPECT--
string(5) "value"
