<?php
while (fscanf(STDIN, '%d', $length) === 1) {
	$counter = 0;
	$names = array();
	while ($counter < $length && fscanf(STDIN, '%s', $name) === 1) {
		$names[] = $name;
		$counter++;
	}
	$names_increasing = $names;
	asort($names_increasing);
	$names_decreasing = array_reverse($names_increasing, TRUE);
	$res = $names_increasing === $names ? "INCREASING" : ($names_decreasing === $names ? "DECREASING" : "NEITHER");
	fprintf(STDOUT, "%s\n", $res);
}
?>