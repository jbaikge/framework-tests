--TEST--
Explicit test of FDOMNode::appendChild().
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$dom = new FDOMDocument();
$root = $dom->rootNode('root-node');
$root->appendChild('sub-node');
$root->appendChild('sub-node', 'with content');
var_dump($dom->asXML(), $dom->asHTML());
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
string(114) "<?xml version="1.0" encoding="UTF-8"?>
<root-node>
  <sub-node/>
  <sub-node>with content</sub-node>
</root-node>
"
string(78) "<root-node><sub-node></sub-node><sub-node>with content</sub-node></root-node>
"
===DONE===
