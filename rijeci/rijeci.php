<?php
function getFib($n)
{
    return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
}
while (fscanf(STDIN, '%d', $input) === 1) {
	fprintf(STDOUT, "%d %d\n", getFib($input-1), getFib($input));
}
?>