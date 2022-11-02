<?php
function isnegative($value){
    return is_numeric($value) && $value < 0;
}
while (fscanf(STDIN, '%d', $num_temps) === 1) {
	while (fscanf(STDIN, '%[0-9- ]', $temp_string) === 1) {
		$temp_array = explode(" ", $temp_string);
	}
	$res = count(array_filter($temp_array, "isnegative"));
	fprintf(STDOUT, "%d\n", $res);
}
?>