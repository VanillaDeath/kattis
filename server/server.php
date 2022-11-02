<?php
while (fscanf(STDIN, "%d%d", $num_tasks, $time) === 2) {
    $tasks = explode(" ", trim(fgets(STDIN)));
    $consumed = 0;
    $i = 0;
    foreach ($tasks as $task) {
        if ($consumed + $task <= $time) {
            $consumed += $task;
            $i++;
        } else {
            break;
        }
    }
    fprintf(STDOUT, "%d\n", $i);
}
