<?php
$res = array("none", "one", "both");
fscanf(STDIN, '%d %d %d %d', $dog1agg, $dog1calm, $dog2agg, $dog2calm);
$arrivals = explode(" ", fgets(STDIN));
foreach($arrivals as $arrival) {
	$time = 0;
	$dogs = 0;
	while ($time < $arrival) {
		$time += $dog1agg;
		if ($time >= $arrival) {
			$dogs++;
		}
		$time += $dog1calm;
	}
	$time = 0;
	while ($time < $arrival) {
		$time += $dog2agg;
		if ($time >= $arrival) {
			$dogs++;
		}
		$time += $dog2calm;
	}
	fprintf(STDOUT, "%s\n", $res[$dogs]);
}
?>