<?php
while (fscanf(STDIN, '%d %d %d %d', $side1, $side2, $side3, $side4) === 4) {
	$sides = array($side1, $side2, $side3, $side4);
	sort($sides);
	fprintf(STDOUT, "%d\n", $sides[0]*$sides[2]);
}
?>