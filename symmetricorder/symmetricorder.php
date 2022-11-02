<?php
$set_num = 1;
while (fscanf(STDIN, '%d', $list_length) === 1 && $list_length != 0) {
	fprintf(STDOUT, "SET %d\n", $set_num);
	$name_num = $pos = 0; // initialize counter and sort position
	$list_length--; // 0-based Array, not 1-based
	$alt = 1; // alternator (1, -1, 1, -1, ...)
	$res = array();
	while ($name_num <= $list_length && fscanf(STDIN, '%s', $name) === 1) {
		//fprintf(STDERR, "%s %d %d %d\n", $name, $name_num, $pos, $alt);
		$res[$pos] = $name;
		$pos += ($list_length-$name_num)*$alt;
		$alt = -$alt;
		$name_num++;
	}
	ksort($res);
	foreach ($res AS $name) {
		fprintf(STDOUT, "%s\n", $name);
	}
	$set_num++;
}

// 0
// +5
// -4
// +3
// -2
// +1

// 0
// 5
// 1
// 4
// 2
// 3
?>