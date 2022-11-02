<?php
while (fscanf(STDIN, '%d', $cases) === 1) {
  while (fscanf(STDIN, '%d', $calories) === 1) {
    fprintf(STDOUT, "%d\n", ceil($calories/400));
  }
}
?>
