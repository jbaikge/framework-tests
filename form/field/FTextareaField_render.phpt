--TEST--
Ensure FTextareaField renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FTextareaField('Fext Field');
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(141) "<label for="Fext Field">Fext Field</label>
<textarea name="Fext Field" id="Fext Field" rows="4" cols="40" class="FTextareaField"></textarea>
"
