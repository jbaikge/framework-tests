--TEST--
Ensure FCookie returns null for non-existant values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

FCookie::initialize();
FCookie::set('test', 'value');
var_dump(FCookie::get('dummy'));
?>
--EXPECT--
NULL
