<?php
define('STDIN',fopen("php://stdin","r"));
define('STDOUT',fopen("php://output","w"));
while (fscanf(STDIN, '%d', $num_trips) === 1) {
	$trip_number = 1;
	while ($trip_number <= $num_trips && fscanf(STDIN, '%d', $num_cities) === 1) {
		$city_number = 1;
		$cities = Array();
		while ($city_number <= $num_cities && fscanf(STDIN, '%s', $city_name) === 1) {
			$cities[] = $city_name;
			$city_number++;
		}
		$res = count(array_unique($cities));
		fprintf(STDOUT, "%d\n", $res);
		$trip_number++;
	}
}
?>