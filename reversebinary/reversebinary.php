<?php
while (fscanf(STDIN, '%d', $input) === 1) {
	fprintf(STDOUT, "%d\n" , bindec(strrev(decbin($input))));
}
?>