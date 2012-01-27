<?php

function coverage_shutdown() {
    $xdebug = var_export(xdebug_get_code_coverage(), true);
    file_put_contents('/home/mark/projects/code/com/framework/form/lib/framework/tests/util/FClassCache_hasInterface_false.xdebug', $xdebug);
    xdebug_stop_code_coverage();
} // end coverage_shutdown()

register_shutdown_function("coverage_shutdown");
xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);

require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
$dummy_load = new FCalendarDay(new DateTime());
var_dump(FClassCache::hasInterface ('FCalendarEvent', 'Dummy'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
