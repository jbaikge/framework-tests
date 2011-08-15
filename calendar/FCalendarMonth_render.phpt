--TEST--
Ensure templates are used properly during rendering.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth('Aug', 2011);

echo FTemplate::fetch($month->getTemplate(), array('month' => &$month));
?>
--EXPECT--
<div class="calendar">
	<div class="weekday-titles">
		<div class="weekday-sunday">Sunday</div>
		<div class="weekday-monday">Monday</div>
		<div class="weekday-tuesday">Tuesday</div>
		<div class="weekday-wednesday">Wednesday</div>
		<div class="weekday-thursday">Thursday</div>
		<div class="weekday-friday">Friday</div>
		<div class="weekday-saturday">Saturday</div>
	</div>
	<div class="week">
		<div class="outer-day">
			<div class="date">Jul 31</div>
		</div>
		<div class="day">
			<div class="date">Aug 1</div>
		</div>
		<div class="day">
			<div class="date">2</div>
		</div>
		<div class="day">
			<div class="date">3</div>
		</div>
		<div class="day">
			<div class="date">4</div>
		</div>
		<div class="day">
			<div class="date">5</div>
		</div>
		<div class="day">
			<div class="date">6</div>
		</div>
	</div>
	<div class="week">
		<div class="day">
			<div class="date">7</div>
		</div>
		<div class="day">
			<div class="date">8</div>
		</div>
		<div class="day">
			<div class="date">9</div>
		</div>
		<div class="day">
			<div class="date">10</div>
		</div>
		<div class="day">
			<div class="date">11</div>
		</div>
		<div class="day">
			<div class="date">12</div>
		</div>
		<div class="day">
			<div class="date">13</div>
		</div>
	</div>
	<div class="week">
		<div class="day">
			<div class="date">14</div>
		</div>
		<div class="day">
			<div class="date">15</div>
		</div>
		<div class="day">
			<div class="date">16</div>
		</div>
		<div class="day">
			<div class="date">17</div>
		</div>
		<div class="day">
			<div class="date">18</div>
		</div>
		<div class="day">
			<div class="date">19</div>
		</div>
		<div class="day">
			<div class="date">20</div>
		</div>
	</div>
	<div class="week">
		<div class="day">
			<div class="date">21</div>
		</div>
		<div class="day">
			<div class="date">22</div>
		</div>
		<div class="day">
			<div class="date">23</div>
		</div>
		<div class="day">
			<div class="date">24</div>
		</div>
		<div class="day">
			<div class="date">25</div>
		</div>
		<div class="day">
			<div class="date">26</div>
		</div>
		<div class="day">
			<div class="date">27</div>
		</div>
	</div>
	<div class="week">
		<div class="day">
			<div class="date">28</div>
		</div>
		<div class="day">
			<div class="date">29</div>
		</div>
		<div class="day">
			<div class="date">30</div>
		</div>
		<div class="day">
			<div class="date">Aug 31</div>
		</div>
		<div class="outer-day">
			<div class="date">Sep 1</div>
		</div>
		<div class="outer-day">
			<div class="date">2</div>
		</div>
		<div class="outer-day">
			<div class="date">3</div>
		</div>
	</div>
</div>

