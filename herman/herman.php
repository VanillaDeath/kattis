<?php
while (fscanf(STDIN, '%d', $r) === 1) {
  $eucl = pi()*pow($r, 2);
  $taxi = 2*pow($r, 2);
  fprintf(STDOUT, "%f\n%f\n", $eucl, $taxi);
}
?>
