<?php
function triangle($i, $map)
{
    $j = 0;
    while ($j < count($map)) {
        if ($map[$i][$j] == 1) {
            $k = $j + 1;
            while ($k < count($map)) {
                if ($map[$i][$k] == 1 && $map[$j][$k] == 1) {
                    return true;
                }
                $k++;
            }
        }
        $j++;
    }
    return false;
}

while (fscanf(STDIN, "%d", $vertices) === 1 && $vertices != -1) {
    $i = 0;
    $map = array();
    while ($i < $vertices) {
        $map[$i] = explode(" ", trim(fgets(STDIN)));
        $i++;
    }
    $i = 0;
    $result = array();
    while ($i < $vertices) {
        if (!triangle($i, $map)) {
            $result[] = $i;
        }
        $i++;
    }
    fprintf(STDOUT, "%s\n", implode(" ", $result));
}
