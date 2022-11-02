<?php
define('STDIN',fopen("php://stdin","r"));
define('STDOUT',fopen("php://output","w"));
while (fscanf(STDIN, '%s', $cipher_text) === 1) {
	$goal_text = str_repeat("PER", strlen($cipher_text)/3);
	$res = count(array_diff_assoc(str_split($cipher_text), str_split($goal_text)));
	fprintf(STDOUT, "%d\n", $res);
}
?>