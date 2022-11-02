<?php
while (fscanf(STDIN, '%d', $cases) === 1) {
  $i = 1;
  while ($i <= $cases) {
    $case = explode(" ", fgets(STDIN));
    $j = 1;
    $lower_bound = 0;
    while ($j < count($case) - 1) {
      $lower_bound += (($case[$j] > $case[$j - 1] * 2) ? $case[$j] - ($case[$j - 1] * 2) : 0);
      $j++;
    }
    fprintf(STDOUT, $lower_bound."\n");
    $i++;
  }
}
?>
