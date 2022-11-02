<?php
while (fscanf(STDIN, '%d', $turns) === 1) {
  fprintf(STDOUT, ($turns%2 === 0) ? "Bob\n" : "Alice\n");
}
?>
