<?php
while ($num_cases = (int) fgets(STDIN)) {
	$i = 1;
	while ($i <= $num_cases) {
		$strings = [trim(fgets(STDIN)), trim(fgets(STDIN))];
		$j = 0;
		$difference = "";
		while ($j < strlen($strings[0])) {
			$difference .= ($strings[0][$j] == $strings[1][$j] ? "." : "*");
			$j++;
		}
		fputs(STDOUT, implode("\n", $strings)."\n".$difference."\n\n");
		$i++;
	}
}
?>