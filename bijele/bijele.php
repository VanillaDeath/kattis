<?php
while (fscanf(STDIN, '%d%d%d%d%d%d', $k, $q, $r, $b, $n, $p)) {
  fprintf(STDOUT, (1-$k)." ".(1-$q)." ".(2-$r)." ".(2-$b)." ".(2-$n)." ".(8-$p)."\n");
}
?>
