<?php
while (fscanf(STDIN, '%d', $input) === 1 && $input != 0) {
	$p = 11;
	while (array_sum(str_split($input*$p)) != array_sum(str_split($input))) {
		$p++;
	}
	fprintf(STDOUT, "%d\n", $p);
}
?>