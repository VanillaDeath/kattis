<?php
$lines = array();
$num_moves = 0;
$line_num = 0;
while (fscanf(STDIN, '%[o. ]', $line) === 1) {
	$lines[] = $line;
	$pos = 0;
	while ($pos <= 6) {
		if ($pos <= 4) {
			$snapshot = substr($line, $pos, 3);
			if ($snapshot == "oo." || $snapshot == ".oo") {
				$num_moves++;
			}
		}
		if ($line_num >= 2) {
			$snapshot = substr($lines[$line_num-2], $pos, 1).substr($lines[$line_num-1], $pos, 1).substr($line, $pos, 1);
			if ($snapshot == "oo." || $snapshot == ".oo") {
				$num_moves++;
			}
		}
		$pos++;
	}
	$line_num++;
}
fprintf(STDOUT, "%d\n", $num_moves);
?>