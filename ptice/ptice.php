<?php
$guesses = ["Adrian" => ["A", "B", "C"], "Bruno" => ["B", "A", "B", "C"], "Goran" => ["C", "C", "A", "A", "B", "B"]];
$right = array();
while ($count = fgets(STDIN)) {
	$correct_answers = str_split(fgets(STDIN));
	foreach ($guesses AS $name => $pattern) {
		$right[$name] = 0;
		$i = 0;
		while ($i < $count) {
			$index = ($i) % (count($pattern));
			$right[$name] += $pattern[$index] == $correct_answers[$i] ? 1 : 0;
			$i++;
		}
	}
	asort($right);
	$right = array_reverse($right);
	fputs(STDOUT, max($right)."\n".implode("\n", array_keys($right, max($right)))."\n");
}
?>