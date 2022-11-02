<?php
while (fscanf(STDIN, '%s', $string) === 1) {
	$length = strlen($string);
	$whitespace = preg_match_all('/\_{1}/', $string)/$length;
	$lowercase = preg_match_all('/[a-z]{1}/', $string)/$length;
	$uppercase = preg_match_all('/[A-Z]{1}/', $string)/$length;
	$symbols = preg_match_all('/[^\_a-zA-Z]{1}/', $string)/$length;
	fprintf(STDOUT, "%f\n%f\n%f\n%f\n", $whitespace, $lowercase, $uppercase, $symbols);
}
?>