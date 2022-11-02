<?php
while (fscanf(STDIN, '%d', $area) === 1) {
	fprintf(STDOUT, "%f\n", sqrt($area)*4);
}
?>