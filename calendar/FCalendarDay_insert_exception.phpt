--TEST--
Ensure FCalendarDay::insert() throws an exception when an event is passed which does not lie on the day specified.
--SKIPIF--
<?php
#require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
try {
	$day->addEvent(FCalendarEvent::newInstance()
		->setCreated('now')
		->setStart('Aug 2, 2011')
		->setEnd('Aug 2, 2011')
	);
	var_dump(false);
} catch (InvalidArgumentException $iae) {
	var_dump(true);
}
?>
--EXPECT--
bool(true)
