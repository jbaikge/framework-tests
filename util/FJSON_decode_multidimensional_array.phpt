--TEST--
Ensure FJSON decodes a multidimensional array.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$json = '{"level_one":{"level_two":{"level_three":{"level_four":{"level_five":"end"}}}}}';
var_dump(FJSON::decode($json, true));
?>
--EXPECT--
array(1) {
  ["level_one"]=>
  array(1) {
    ["level_two"]=>
    array(1) {
      ["level_three"]=>
      array(1) {
        ["level_four"]=>
        array(1) {
          ["level_five"]=>
          string(3) "end"
        }
      }
    }
  }
}
