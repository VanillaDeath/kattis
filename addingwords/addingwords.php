<?php
$definitions = [];
while ($statement = trim(fgets(STDIN))) {
	$elements = explode(" ", $statement);
	switch ($elements[0]) {
		case "def":
		$definitions[$elements[1]] = $elements[2];
		break;
		case "calc":
		array_shift($elements);
		$i = 0;
		$answer = 0;
		$mult = 1;
		while ($elements[$i] != "=") {
			switch($elements[$i]) {
				case "+":
				$mult = 1;
				break;
				case "-":
				$mult = -1;
				break;
				default:
				if (array_key_exists($elements[$i], $definitions)) {
					$answer += $definitions[$elements[$i]] * $mult;
				} else {
					$answer = false;
					break 2;
				}
			}
			$i++;
		}
		$res = implode(" ", $elements)." ".($answer !== false && in_array($answer, $definitions) ? array_search($answer, $definitions) : "unknown");
		fputs(STDOUT, $res."\n");
		break;
		case "clear":
		$definitions = [];
		break;
	}
}
?>