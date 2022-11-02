<?php
while (fscanf(STDIN, '%s', $name) === 1) {
	fprintf(STDOUT, "%s", preg_replace("/(.)\\1+/", "$1", $name));
}
?>