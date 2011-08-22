--TEST--
Ensure FCalendarEvent::setStart() throws an exception with an invalid string time.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

try {
	var_dump(
		FCalendarEvent::newInstance()
			->setStart('Aug 1, 3pm')
			->getStart() instanceof DateTime
	);
} catch (Exception $e) {
	var_dump($e->getMessage());
}
?>
--EXPECT--
string(132) "DateTime::__construct(): Failed to parse time string (Aug 1, 3pm) at position 8 (p): The timezone could not be found in the database"
