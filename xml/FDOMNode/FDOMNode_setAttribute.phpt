--TEST--
Testing attributes on the root node.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$dom = new FDOMDocument();
$dom->rootNode('root-node')->setAttribute('attr', 'test');
var_dump($dom->asXML(), $dom->asHTML());
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
string(64) "<?xml version="1.0" encoding="UTF-8"?>
<root-node attr="test"/>
"
string(36) "<root-node attr="test"></root-node>
"
===DONE===
