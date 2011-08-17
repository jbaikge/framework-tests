<?php

class CoverageCalculator {
	private static $coverageStats = array();
	private static $report = array();
	public static function merge (CoverageParser $parser) {
		foreach ($parser as $filename => $stats) {
			if (strpos($filename, '.class.php') === false) {
				continue;
			}
			// weed out anything with "eval()'d code" at the end
			if (strpos($filename, 'eval()') !== false) {
				continue;
			}
			if (!isset(self::$coverageStats[$filename])) {
				self::$coverageStats[$filename] = $stats;
			} else {
				foreach ($stats as $line => $stat) {
					if ($stats[$line] > 0) {
						self::$coverageStats[$filename][$line] = $stat;
					}
				}
			}
		}
	}
	public static function generateReport () {
		foreach (self::$coverageStats as $filename => $stats) {
			$class = str_replace('.class.php', '', basename($filename));
			self::$report[$class] = array(
				'executable' => count(array_filter($stats, array(__CLASS__, 'filterExecutable'))),
				'executed' => count(array_filter($stats, array(__CLASS__, 'filterExecuted'))),
				'unexecuted' => array_keys(array_filter($stats, array(__CLASS__, 'filterUnexecuted'))),
			);
			self::$report[$class]['percentage'] = self::$report[$class]['executed'] / self::$report[$class]['executable'];
		}
		ksort(self::$report);
	}
	public static function toString () {
		self::generateReport();
		$total_executable = 0;
		$total_executed = 0;
		foreach (self::$report as $class => $coverage) {
			$total_executable += $coverage['executable'];
			$total_executed += $coverage['executed'];
			printf("%6.2f%% %-24s %s\n", $coverage['percentage'] * 100, $class, implode(",", $coverage['unexecuted']));
		}
		echo str_repeat('-', 32) . PHP_EOL;
		printf("%6.2f%% Total Coverage\n", $total_executed / $total_executable * 100);
	}
	private static function filterExecuted ($value) {
		return $value > 0;
	}
	private static function filterExecutable ($value) {
		return $value > -2;
	}
	private static function filterUnexecuted ($value) {
		return $value == -1;
	}
}

class CoverageParser implements IteratorAggregate {
	private $stats = array();
	public function __construct ($filename) {
		$this->parse($filename);
	}
	public function getIterator () {
		return new ArrayIterator($this->stats);
	}
	private function parse ($filename) {
		eval('$this->stats = ' . file_get_contents($filename) . ';');
	}
}

class XDebugFilter extends RecursiveFilterIterator {
	private static $excluded_dirs = array(
		'.svn' => true
	);
	public function accept () {
		$file = $this->current();
		$is_file = $file->isFile();
		$filename = $file->getFilename();
		return (
			$is_file
			&&
			strpos($filename, '.xdebug') !== false
		) || (
			!$is_file
			&& !isset(self::$excluded_dirs[$filename])
		);
	}
}

$rdi = new RecursiveDirectoryIterator(dirname(__FILE__), RecursiveDirectoryIterator::FOLLOW_SYMLINKS);
$xdf = new XDebugFilter($rdi);
$rii = new RecursiveIteratorIterator($xdf);
foreach ($rii as $filename => $info) {
	CoverageCalculator::merge(new CoverageParser($filename));
}

CoverageCalculator::toString();
