<?php
while (fscanf(STDIN, '%f', $cost) === 1) {
  while (fscanf(STDIN, '%f', $num_lawns) === 1) {
    $lawn = 1;
    $total = 0;
    while ($lawn <= $num_lawns && fscanf(STDIN, '%f%f', $w, $l) === 2) {
      $total += $cost*$w*$l;
      $lawn++;
    }
    fprintf(STDOUT, "%f\n", $total);
  }
}
?>
