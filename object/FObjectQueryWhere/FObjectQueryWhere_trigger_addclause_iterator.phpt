--TEST--
Ensure FObjectQueryWhere::add properly triggers the autoGlue() method passing in an Iterator as an argument.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
// Create a simple iterator
class dumbIterator implements Iterator {
	private $position = 0;
	private $array = array('1','2','3');

	public function __construct() {
		$this->position = 0; }
	function rewind() {
		$this->position = 0;
	}
	function current() {
		return $this->array[$this->position];
	}
	function key() {
		return $this->position;
	}
	function next() {
		++$this->position;
	}
	function valid() {
		return isset($this->array[$this->position]);
	}
}

define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$where = new FObjectQueryWhere('MyWhereClass');
$where->add('field1', 'in', array(new dumbIterator()));
var_dump((string)$where);
?>
--EXPECT--
string(28) "  field1 IN ('1', '2', '3')
"
