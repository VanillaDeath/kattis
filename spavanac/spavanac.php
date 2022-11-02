<?php
while (fscanf(STDIN, '%d %d', $hour, $minute) === 2) {
	$minute -= 45;
	if ($minute < 0) {
		$minute += 60;
		$hour--;
		if ($hour < 0) {
			$hour += 24;
		}
	}
	fprintf(STDOUT, "%d %d\n", $hour, $minute);
}
?>