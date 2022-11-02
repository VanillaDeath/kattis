<?php
if (fscanf(STDIN, '%d%d%d', $x, $y, $n) === 3) {
  $i = 1;
  while ($i <= $n) {
    $fizzbuzz = ($i%$x == 0 ? "Fizz" : "") . ($i%$y == 0 ? "Buzz" : "");
    fprintf(STDOUT, ($fizzbuzz ? $fizzbuzz : $i)."\n");
    $i++;
  }
}
?>
