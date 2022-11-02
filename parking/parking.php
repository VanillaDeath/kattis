<?php
$parktimes = [];
define('ARR',	1);
define('DEP',	-1);
while ($rates = fgets(STDIN)) {
	// $rates = array (0 => 0, 1 => one_truck_rate, 2 => two_truck_rate, 3 => three_truck_rate, ...);
	// This script can handle more than three trucks at a time :)
	$rates = array_merge([0], explode(" ", $rates));
	while ($parktime = fgets(STDIN)) {
		$parktime = explode(" ", $parktime);
		$parktimes[] = array((int) $parktime[0], ARR);
		$parktimes[] = array((int) $parktime[1], DEP);
	}
	// This sort function sorts the $parktimes Array based on parking times (index [0])
	// This prepares us to iterate over the Array in chronological order and adjust the rate based on arrival/departure (index [1])
	usort($parktimes, function($a, $b) {return $a[0] - $b[0];});
	$i = 1;
	$res = 0;
	$num_parked = 1;
	while ($i < count($parktimes)) {
		// Add difference since last change in rate * current rate * number of trucks parked
		$res += ($parktimes[$i][0] - $parktimes[$i-1][0]) * $rates[$num_parked] * $num_parked;
		// Adjust number of currently parked trucks based on arrival (+1) or departure (-1)
		$num_parked += $parktimes[$i][1];
		$i++;
	}
	fputs(STDOUT, "$res\n");
}
?>