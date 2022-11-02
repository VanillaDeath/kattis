<?php
$digits = array(
	"**** ** ** ****",
	"  *  *  *  *  *",
	"***  *****  ***",
	"***  ****  ****",
	"* ** ****  *  *",
	"****  ***  ****",
	"****  **** ****",
	"***  *  *  *  *",
	"**** ***** ****",
	"**** ****  ****"
);
$lines = array();
$res = TRUE;
while (fscanf(STDIN, '%[* ]', $line) === 1) {
	$lines[] = str_split($line, 4);
}
$num_digits = count($lines[0]);
$i = 0;
$digit = array();
while ($i < $num_digits) {
	$this_digit = "";
	foreach($lines AS $line) {
		$this_digit .= substr($line[$i], 0, 3);
	}
	$find_digit = array_search($this_digit, $digits);
	if ($find_digit !== FALSE) {
		$digit[$i] = $find_digit;
	} else {
		$res = FALSE;
		break;
	}
	$i++;
}
if ($res) {
	if (implode($digit) % 6 != 0) {
		$res = FALSE;
	}
}
fprintf(STDOUT, "%s\n", $res ? "BEER!!" : "BOOM!!");
?>