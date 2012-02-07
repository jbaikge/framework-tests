--TEST--
Ensure FHiddenField renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FHiddenField('hidden');
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(78) "<input type="hidden" value="" name="hidden" id="hidden" class="FHiddenField">
"
