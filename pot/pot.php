<?php
while (fscanf(STDIN, '%d', $num) === 1) {
  $total = 0;
  for ($i=1; $i<=$num; $i++) {
    fscanf(STDIN, '%d', $addend);
    $pow = substr($addend, -1);
    $addend = substr($addend, 0, -1);
    $total += pow($addend, $pow);
  }
  fprintf(STDOUT, $total."\n");
}
?>
