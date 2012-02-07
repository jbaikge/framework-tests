--TEST--
Ensure FCheckboxGroup renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FCheckboxGroup('checkbox');
$field->options(array(1=>'value 1', 2=>'value 2'));
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(293) "<label for="checkbox">Checkbox</label>
<label for="checkbox[1]" class="checkbox"><input type="checkbox" id="checkbox[1]" name="checkbox[1]" value="1"> value 1</label><label for="checkbox[2]" class="checkbox"><input type="checkbox" id="checkbox[2]" name="checkbox[2]" value="2"> value 2</label>"
