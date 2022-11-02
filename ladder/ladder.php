<?php
while (fscanf(STDIN, '%d %d', $h, $v) === 2) {
	fprintf(STDOUT, "%d\n", ceil($h/sin(deg2rad($v))));
}
?>