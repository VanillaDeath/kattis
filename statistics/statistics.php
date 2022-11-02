<?php
$case_num = 1;
while ($values = trim(fgets(STDIN))) {
    $values = explode(" ", $values);
    array_shift($values);
    $min = min($values);
    $max = max($values);
    $range = $max - $min;
    fprintf(STDOUT, "Case %d: %d %d %d\n", $case_num, $min, $max, $range);
    $case_num++;
}
