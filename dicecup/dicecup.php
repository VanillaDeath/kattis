<?php
while (fscanf(STDIN, '%d%d', $n, $m)) {
  $avg = ceil(($n+$m)/2) + 1;
  $count = abs(($m-$n)) + 1;
  $start = $avg-floor($count/2);
  $i = 0;
  while ($i < $count) {
    fprintf(STDOUT, ($start+$i)."\n");
    $i++;
  }
}
?>
