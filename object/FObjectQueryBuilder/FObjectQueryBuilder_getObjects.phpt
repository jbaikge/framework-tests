--TEST--
Ensure FObjectQueryBuilder::getObjects returns an iterator instance of objects that are the result of a query.
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
$FOQB = FObjectQuery::select('MyBuilderClass');
var_dump($FOQB->getObjects());
?>
--EXPECTF--
array(1) {
  [0]=>
  object(MyBuilderClass)#%d (%d) {
    ["changes":"FObject":private]=>
    array(0) {
    }
    ["data":"FObject":private]=>
    array(%d) {
      ["id"]=>
      string(1) "%d"
      ["parent_id"]=>
      NULL
      ["creator_id"]=>
      NULL
      ["builder_field"]=>
      string(7) "testing"
      ["cast_field"]=>
      string(10) "characters"
      ["_added"]=>
      string(19) "%s"
      ["_updated"]=>
      string(19) "%s"
    }
    ["observers":"FObject":private]=>
    array(%d) {
      ["hooks"]=>
      array(%d) {
      }
      ["methods"]=>
      array(%d) {
      }
    }
    ["observerInstances":"FObject":private]=>
    array(%d) {
    }
  }
}
