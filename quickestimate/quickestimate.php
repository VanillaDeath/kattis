<?php
while (fscanf(STDIN, '%d', $num_cases) === 1) {
    while (fscanf(STDIN, '%s', $cost) === 1) {
        fprintf(STDOUT, "%d\n", strlen($cost));
    }
}
