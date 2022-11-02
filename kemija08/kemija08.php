<?php
$inputs = array('/apa/i', '/epe/i', '/ipi/i', '/opo/i', '/upu/i');
$outputs = array('a', 'e', 'i', 'o', 'u');
while (fscanf(STDIN, '%[a-zA-Z0-9 ]', $input) === 1) {
	fprintf(STDOUT, "%s\n", preg_replace($inputs, $outputs, $input));
}
?>