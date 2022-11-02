<?php
while (fscanf(STDIN, '%s', $cards) === 1) {
  $cards = str_split($cards, 3);
  $suit = array("P" => 0, "K" => 0, "H" => 0, "T" => 0);
  if (max(array_count_values($cards)) > 1) {
    fprintf(STDOUT, "GRESKA\n");
  } else {
    foreach ($cards as $card) {
      $suit[substr($card,0,1)]++;
    }
    fprintf(STDOUT, "%s %s %s %s\n", 13-$suit["P"], 13-$suit["K"], 13-$suit["H"], 13-$suit["T"]);
  }
}
?>
