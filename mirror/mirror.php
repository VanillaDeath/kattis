<?php
while (fscanf(STDIN, '%d', $cases) === 1) {
  $test = 1;
  while (fscanf(STDIN, '%d%d', $r, $c) === 2) {
    $img = array();
    $i = 1;
    while ($i<=$r && fscanf(STDIN, '%s', $row) === 1) {
      array_unshift($img, strrev($row));
      $i++;
    }
    fprintf(STDOUT, "Test %d\n%s\n", $test, implode("\n", $img));
    $test++;
  }
}
?>
