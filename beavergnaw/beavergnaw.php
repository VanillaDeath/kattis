<?php
while (fscanf(STDIN, '%d%d', $d, $v) === 2 && $d != 0 && $v != 0) {
  $h = pow(pow($d, 3)-6*$v/pi(), 1/3);
  fprintf(STDOUT, "%f\n", $h);
}
?>
