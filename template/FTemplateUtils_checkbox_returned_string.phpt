--TEST--
FTemplateUtils::checkbox returned string value.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

// Blank value, no check
$cbox = FTemplateUtils::checkbox ('Label', 'test', 1, 1, 'test', true);
echo $cbox . PHP_EOL;
?>
--EXPECT--
<label for="test" class="checkbox"><input type="checkbox" id="test" name="test" value="1" checked="checked"> Label</label>
