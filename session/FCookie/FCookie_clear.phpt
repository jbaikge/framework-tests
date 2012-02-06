--TEST--
Ensure FCookie clears cookie values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

FCookie::initialize();
FCookie::set('test', 'value');
$pre_clear = FCookie::get('test');
FCookie::clear();
$post_clear = FCookie::get('test');

var_dump($pre_clear, $post_clear);
?>
--EXPECT--
string(5) "value"
NULL
