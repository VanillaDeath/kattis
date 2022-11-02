<?php
while (fscanf(STDIN, '%[0-9a-zA-Z. ]', $line) === 1) {
	$name_pattern = '/[a-zA-Z ]{2,}/i';
	preg_match($name_pattern, $line, $name);
	$heart_rates = explode(" ", preg_replace($name_pattern, '', $line));
	$avg = array_sum($heart_rates) / count($heart_rates);
	fprintf(STDOUT, "%f %s\n", $avg, trim($name[0]));
}
?>