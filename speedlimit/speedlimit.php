<?php
while (fscanf(STDIN, '%d', $set_size) === 1 && $set_size != -1) {
	$entry = 1;
	$last_time = 0;
	$distance = 0;
	while ($entry <= $set_size && fscanf(STDIN, '%d %d', $speed, $total_time) === 2) {
		$distance += $speed * ($total_time - $last_time);
		$last_time = $total_time;
		$entry++;
	}
	fprintf (STDOUT, "%d miles\n", $distance);
}
?>