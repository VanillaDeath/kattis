<?php
define("g", 9.81);
while (fscanf(STDIN, '%d', $num_cases) === 1) {
    while (fscanf(STDIN, '%f%f%f%f%f', $v0, $theta, $x1, $h1, $h2) === 5) {
        // $x1 = $v0 * $t * cos(deg2rad($theta));
        $theta = deg2rad($theta);
        $t = $x1/($v0 * cos($theta));
        $y = $v0 * $t * sin($theta) - ((g/2) * ($t**2));
        fprintf(STDOUT, "%s\n", $y > $h1+1 && $y < $h2-1 ? "Safe" : "Not Safe");
    }
}
