<?php
while (fscanf(STDIN, '%d%d', $r, $c) === 2) {
  fprintf(STDOUT, '%f', (pow(pi()*($r-$c),2)/pow(pi()*$r,2))*100);
}
?>
