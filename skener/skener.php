<?php
while (fscanf(STDIN, '%d%d%d%d', $r, $c, $z_r, $z_c) === 4) {
  $i = 1;
  while ($i <= $r) {
    $row = str_split(trim(fgets(STDIN)));
    $z_row = "";
    foreach ($row as $char) {
      $z_row .= str_repeat($char, $z_c);
    }
    $j = 1;
    while ($j <= $z_r) {
      fprintf(STDOUT, $z_row."\n");
      $j++;
    }
    $i++;
  }
}
?>
