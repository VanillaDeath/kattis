<?php
while (fscanf(STDIN, '%d %d %d %d', $die1min, $die1max, $die2min, $die2max) === 4) {
	$player[] = ($die1max-(($die1max-$die1min)/2))+($die2max-(($die2max-$die2min)/2));
}
fprintf(STDOUT, "%s", $player[0] > $player[1] ? "Gunnar" : ($player[1] > $player[0] ? "Emma" : "Tie"));
?>