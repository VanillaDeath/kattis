<?php
$points = $lengths = $result = array();
while (fscanf(STDIN, '%d', $num_points) === 1) {
    while (fscanf(STDIN, '%f%f', $x, $y) === 2) {
        $points[] = array("x" => $x, "y" => $y);
    }
    foreach ($points as $key => $point) {
        $i = 0;
        while ($i < count($points)) {
            if ($i != $key) {
                $lengths[$key][$i] = (int)($i < $key ? round($lengths[$i][$key]) : ($i > $key ? round(sqrt(($points[$i]["x"]-$point["x"])**2 + ($points[$i]["y"]-$point["y"])**2)) : 0));
            }
            $i++;
        }
    }
    $i = 0;
    foreach (array_keys($lengths) as $key) {
        unset($lengths[$key][$i]);
    }
    fprintf(STDOUT, "%d\n", $i);
    while (count($result) < count($points)-1) {
        $i = array_keys($lengths[$i], min($lengths[$i]));
        $result[] = $i = min($i);
        // unset($lengths[$i]);
        foreach (array_keys($lengths) as $key) {
            unset($lengths[$key][$i]);
        }
        fprintf(STDOUT, "%d\n", $i);
    }
}
