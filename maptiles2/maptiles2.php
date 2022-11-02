<?php
while (fscanf(STDIN, '%s', $quadkey) === 1) {
	$z = $i = strlen($quadkey);
	$x = $y = 0;
	while ($i > 0) {
		$mask = 1 << ($i-1);
		$cell = substr($quadkey, $z-$i, 1);
		if (($cell & 1) != 0) {
			$x += $mask;
		}
		if (($cell & 2) != 0){
			$y += $mask;
		}
		$i--;
	}
	fprintf(STDOUT, "%d %d %d\n", $z, $x, $y);
}
?>