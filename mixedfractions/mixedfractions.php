<?php
while (fscanf(STDIN, '%d %d', $numerator, $denominator) === 2 && $denominator != 0) {
	$res = floor($numerator / $denominator)." ".($numerator % $denominator)." / ".$denominator;
	fprintf(STDOUT, "%s\n", $res);
}
?>