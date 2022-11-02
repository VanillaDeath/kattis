<?php
while (fscanf(STDIN, '%d', $num_cases) === 1) {
    while (fscanf(STDIN, '%d%d', $case_num, $n) === 2) {
        $s1 = $n*(($n/2)+.5);
        $s3 = $s1*2;
        $s2 = $s3 - $n;
        fprintf(STDOUT, "%d %d %d %d\n", $case_num, $s1, $s2, $s3);
    }
}
