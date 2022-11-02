<?php
$scores = array (
  "A" => array("d" => 11, "n" => 11),
  "K" => array("d" => 4, "n" => 4),
  "Q" => array("d" => 3, "n" => 3),
  "J" => array("d" => 20, "n" => 2),
  "T" => array("d" => 10, "n" => 10),
  "9" => array("d" => 14, "n" => 0),
  "8" => array("d" => 0, "n" => 0),
  "7" => array("d" => 0, "n" => 0)
);
while (fscanf(STDIN, '%d%s', $hands, $dominant) === 2) {
  $count = $hands*4;
  $score = 0;
  $i = 1;
  while ($i <= $count && fscanf(STDIN, '%s', $card) === 1) {
    $score += $scores[substr($card, 0, -1)][strtoupper(substr($card, -1)) === strtoupper($dominant) ? "d" : "n"];
    $i++;
  }
  fprintf(STDOUT, $score."\n");
}
?>
