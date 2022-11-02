<?php
while (fscanf(STDIN, '%f%f%f%f%f', $x1, $y1, $x2, $y2, $p) === 5) {
    $result = ((abs($x1 - $x2)**$p) + (abs($y1 - $y2)**$p))**(1/$p);
    fprintf(STDOUT, "%f\n", $result);
}
