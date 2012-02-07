--TEST--
Ensure FCheckboxField renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FCheckboxField('checkbox');
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(119) "<label for="checkbox" class="checkbox"><input type="checkbox" id="checkbox" name="checkbox" value="1"> Checkbox</label>"
