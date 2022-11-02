<?php
function str_rot($s, $n = 13) {
    static $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ_.';
    if (!$n) return $s;
    for ($i = 0, $l = strlen($s); $i < $l; $i++) {
        $s[$i] = $letters[(strpos($letters, $s[$i]) + $n) % (strlen($letters))];
    }
    return $s;
}
while (fscanf(STDIN, '%d %s', $rot_amount, $string) === 2 && $rot_amount != 0) {
	fprintf(STDOUT, "%s\n", str_rot(strrev($string), $rot_amount));
}
?>