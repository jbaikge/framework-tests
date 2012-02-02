--TEST--
Ensure FObjectQueryBuilder::toString() produces a well-formed query.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FObjectQuery::updateStructure();

echo FObjectQuery::select('MyBuilderClass');
?>
--EXPECT--
SELECT *
FROM
  v_MyBuilderClass
