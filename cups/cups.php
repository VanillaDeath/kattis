<?php
$colours = array();
while (fscanf(STDIN, '%d', $count) === 1) {
  $i = 1;
  while ($i <= $count && fscanf(STDIN, '%s%s', $token1, $token2) === 2) {
    if (is_numeric($token1)) {
      $colour = $token2;
      $radius = (int)$token1/2;
    } else {
      $colour = $token1;
      $radius = $token2;
    }
    if (array_key_exists($colour, $colours)) {
      $colours[$colour] += $radius;
    } else {
      $colours[$colour] = $radius;
    }
    $i++;
  }
  asort($colours);
  fprintf(STDOUT, implode("\n", array_keys($colours))."\n");
}
?>
