<?php


function coverage_shutdown() {
    $xdebug = var_export(xdebug_get_code_coverage(), true);
    file_put_contents('/home/jake/svn/framework/code/tests/calendar/FCalendarEvent_setStart_string.xdebug', $xdebug);
xdebug_stop_code_coverage();
} // end coverage_shutdown()
register_shutdown_function("coverage_shutdown");
xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);

require_once(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(
FCalendarEvent::newInstance()
->setStart('Aug 1, 2011 3pm')
->setDuration(new DateInterval('PT15M'))
->getEnd() , new DateTime('Aug 1, 2011 3:15pm')
);
?>
