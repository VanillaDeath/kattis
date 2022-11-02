<?php
fscanf(STDIN, '%d', $l);
fscanf(STDIN, '%d', $d);
fscanf(STDIN, '%d', $x);
while (array_sum(str_split($l)) != $x) {
  $l++;
}
fprintf(STDOUT, $l."\n");
while (array_sum(str_split($d)) != $x) {
  $d--;
}
fprintf(STDOUT, $d."\n");
?>
