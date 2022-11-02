<?php
while (fscanf(STDIN, '%d', $count)) {
  $i = 1;
  while ($i <= $count) {
    fprintf(STDOUT, $i." Abracadabra\n");
    $i++;
  }
}
?>
