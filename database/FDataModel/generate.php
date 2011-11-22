<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$reflection = new ReflectionClass('FDataModel');
$methods = $reflection->getMethods(ReflectionMethod::IS_STATIC | ReflectionMethod::IS_PUBLIC);

foreach ($methods as &$method) {
	$invalid = false;
	foreach (array('add', 'set', 'get') as $prefix) {
		$invalid |= FString::startsWith($method->getName(), $prefix);
	}
	if ($invalid) {
		continue;
	}
	generate_test($method);
}

function generate_test(ReflectionMethod $method) {
	$class_name = $method->getDeclaringClass()->getName();
	$method_name = $method->getName();
	$filename = sprintf('%s/%s_%s.phpt', dirname(__FILE__), $class_name, $method_name);
	$fh = fopen($filename, 'w');
	fwrite($fh, "--TEST--\n");
	fprintf($fh, "Ensure %s::%s() generates proper column definition.\n", $class_name, $method_name);
	fwrite($fh, "--FILE--\n");
	fwrite($fh, "<?php\n");
	fwrite($fh, "require(dirname(__FILE__) . '/../../webroot.conf.php');\n");
	fprintf($fh, "var_dump(%s::%s()->getDefinition('test'));\n", $class_name, $method_name);
	fwrite($fh, "?>\n");
	fwrite($fh, "--EXPECT--\n");
	ob_start();
	var_dump($class_name::$method_name()->getDefinition('test'));
	fwrite($fh, ob_get_clean() . "\n");
	fclose($fh);
}
