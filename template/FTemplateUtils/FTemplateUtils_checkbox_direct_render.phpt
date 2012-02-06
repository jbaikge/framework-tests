--TEST--
FTemplateUtils::checkbox direct render.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

// Blank value, no check
FTemplateUtils::checkbox ('Label', 'test', 1, 1, $id = null, $return = false); echo PHP_EOL;
?>
--EXPECT--
<label for="test" class="checkbox"><input type="checkbox" id="test" name="test" value="1" checked="checked"> Label</label>
