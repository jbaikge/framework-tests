--TEST--
FTemplateUtils::radio button returned string value.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$radio = FTemplateUtils::radio ('Label', 'test', 1, 1, 'test', true);
echo $radio . PHP_EOL;
?>
--EXPECT--
<label for="test-1" class="radio"><input type="radio" id="test-1" name="test" value="1" checked="checked"> Label</label>
