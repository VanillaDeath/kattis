<?php
fscanf(STDIN, '%d', $player);
fscanf(STDIN, '%d', $num_turns);
$turn = 1;
$elapsed_time = 0;
do {
	fscanf(STDIN, '%d %s', $time, $answer);
	$elapsed_time += $time;
	$player = $answer == "T" && $elapsed_time < 210 ? ($player % 8) + 1 : $player;
	$turn++;
} while ($turn <= $num_turns && $elapsed_time < 210);
fprintf(STDOUT, "%d\n", $player);
?>