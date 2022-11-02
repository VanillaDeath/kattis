<?php
$values = array();
while (fscanf(STDIN, '%d', $value) === 1) {
	$values[] = $value % 42;
}
fprintf(STDOUT, "%d\n", count(array_unique($values)));
?>