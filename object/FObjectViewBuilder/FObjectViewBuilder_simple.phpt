--TEST--
Ensure FObjectViewBuilder::_construct returns an object of type FObjectViewBuilder.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FObjectQuery::updateStructure();
MyBuilderClass::setup();
$FOVB = new FObjectViewBuilder(new MyBuilderClass());
var_dump($FOVB);
?>
--EXPECTF--
object(FObjectViewBuilder)#%d (%d) {
  ["fields":"FObjectViewBuilder":private]=>
  NULL
  ["previewTable":"FObjectViewBuilder":private]=>
  string(%d) "vp_MyBuilderClass"
  ["type":"FObjectViewBuilder":private]=>
  string(%d) "MyBuilderClass"
  ["viewTable":"FObjectViewBuilder":private]=>
  string(%d) "v_MyBuilderClass"
}
