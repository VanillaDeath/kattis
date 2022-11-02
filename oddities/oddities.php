<?php
while (fscanf(STDIN, '%d', $list_length) === 1) {
	$index = 1;
	while ($index <= $list_length && fscanf(STDIN, '%d', $value)) {
		fprintf(STDOUT, "%d is %s\n", $value, $value % 2 == 0 ? "even" : "odd");
		$index++;
	}
}
?>