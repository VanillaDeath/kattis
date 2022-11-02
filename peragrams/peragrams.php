<?php
while (fscanf(STDIN, "%s", $input) === 1) {
    $i = 0;
    // $input = str_split($input);
    $counts = count_chars($input, 1);
    $unique = count_chars($input, 3);
    if ($unique > 1) {
        $i += strlen($unique) - 1;
        $unique_a = str_split($unique);
        array_pop($unique_a);
        $input = str_replace($unique_a, $input);
    }
    asort($counts);
    $palfound = false;
    while ($palfound !== true) {
        if (count($input)%2 === 1) {
        } else {
        }
        $i++;
    }
}
