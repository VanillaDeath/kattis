<?php
while (fscanf(STDIN, "%d%d", $sweet, $sour) === 2) {
    if ($sweet + $sour == 13) {
        $result = "Never speak again.";
    } elseif ($sweet > $sour) {
        $result = "To the convention.";
    } elseif ($sweet < $sour) {
        $result = "Left beehind.";
    } elseif ($sweet == $sour && $sweet > 0 && $sour > 0) {
        $result = "Undecided.";
    } else {
        $result = null;
    }
    if ($result) {
        fprintf(STDOUT, "%s\n", $result);
    }
}
