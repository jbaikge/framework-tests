--TEST--
Ensure FTextField renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FTextField('Fext Field');
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(125) "<label for="Fext Field">Fext Field</label>
<input type="text" value="" name="Fext Field" id="Fext Field" class="FTextField">
"
