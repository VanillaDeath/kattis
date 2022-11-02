<?php
while (fscanf(STDIN, '%d', $start) === 1) {
  fscanf(STDIN, '%d', $end);
  $cw_dist = $end-$start+($end<$start ? 360 : 0);
  $ccw_dist = -($start-$end+($end>$start ? 360 : 0));
  fprintf(STDOUT, "%d\n", $cw_dist <= 180 ? $cw_dist : $ccw_dist);
}
?>
