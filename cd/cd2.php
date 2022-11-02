<?php
while (true) {
	list($N, $M) = explode(' ', fgets(STDIN));
	$M = intval($M);
	$N = intval($N);
	if ($N === 0 && $M === 0) {
		break;
	}
	$cds = array();
	$pointer = 0;
	$sellCount = 0;
	for ($i = 0; $i < $N; $i++) {
		$cds[]  = intval(fgets(STDIN), 10);
	}
	$len = count($cds) - 1;
	for ($i = 0; $i < $M; $i++) {
		$input = intval(fgets(STDIN), 10);
		while ($pointer < $len && $cds[$pointer] < $input) {
			$pointer++;
		}
		if ($cds[$pointer] === $input) {
			$sellCount++;
		}
	}
	fputs(STDOUT, "$sellCount\n");
}
?>