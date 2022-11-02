<?php
$letters = array("T", "C", "G");
while (fscanf(STDIN, '%s', $cards) === 1) {
  $score = 0;
  foreach ($letters as $letter) {
    $count[$letter] = substr_count($cards, $letter);
    $score += pow($count[$letter], 2);
  }
  $score += min($count) > 0 ? min($count)*7 : 0;
  fprintf(STDOUT, "%d\n", $score);
}
?>
