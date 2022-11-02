<?php
$i = 1;
while (fscanf(STDIN, '%d', $num_cases) === 1) {
	while ($i <= $num_cases && fscanf(STDIN, '%[a-zA-Z0-9. ]', $instruction)) {
		if (substr($instruction, 0, 10) == "Simon says") {
			fprintf(STDOUT, "%s\n", substr($instruction, 11));
		}
		$i++;
	}
}
?>