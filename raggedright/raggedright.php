<?php
$lines = array();
while ($line = fgets(STDIN)) {
	$lines[] = $line;
}
$line_lengths = array_map('strlen', $lines);
$n = max($line_lengths);
$i = 0;
$score = 0;
while ($i < count($line_lengths) - 1) {
	if ($line_lengths[$i] < $n) {
		$score += pow(($n - $line_lengths[$i]), 2);
	}
	$i++;
}
fprintf (STDOUT, "%d\n", $score);
?>