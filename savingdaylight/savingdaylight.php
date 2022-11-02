<?php
while (fscanf(STDIN, "%s %d %d %d:%d %d:%d", $month, $day, $year, $hour1, $minute1, $hour2, $minute2) === 7) {
    $hours = $hour2 - $hour1 - ($minute1 > $minute2 ? 1 : 0);
    $minutes = ($minute2 >= $minute1 ? $minute2 : 60 + $minute2) - $minute1;
    fprintf(STDOUT, "%s %d %d %d hours %d minutes\n", $month, $day, $year, $hours, $minutes);
}
