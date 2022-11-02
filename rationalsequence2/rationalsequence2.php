<?php
while (fscanf(STDIN, '%d', $num_cases) === 1) {
    while (fscanf(STDIN, '%d %d/%d', $case_num, $p, $q) === 3) {
        $traversal = "";
        while ($p != 1 || $q != 1) {
            if ($p > $q) {
                $p -= $q;
                $traversal = "r".$traversal;
            } else {
                $q -= $p;
                $traversal = "l".$traversal;
            }
        }
        $i = 0;
        $result = 0;
        while ($i < strlen($traversal)) {
            $result = substr($traversal, $i, 1) === "r" ? 2*($result+1) : 2*$result+1;
            $i++;
        }
        fprintf(STDOUT, "%d %d\n", $case_num, $result+1);
    }
}
