--TEST--
Testing content placement within a node while dynamically appending the node to the DOM.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$dom = new FDOMDocument();
$dom->rootNode('rootNode', 'content')->subnode('here is more content with a tag: <myTag/>');
var_dump($dom->asXML(),$dom->asHTML());
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
string(134) "<?xml version="1.0" encoding="UTF-8"?>
<rootNode>content<subnode>here is more content with a tag: &lt;myTag/&gt;</subnode></rootNode>
"
string(95) "<rootNode>content<subnode>here is more content with a tag: &lt;myTag/&gt;</subnode></rootNode>
"
===DONE===
