<?php
$cups = array(TRUE, FALSE, FALSE);
while ($line = fgets(STDIN)) {
	$i = 0;
	while ($i < strlen($line)) {
		switch (strtoupper($line[$i])) {
			case "A":
			$temp = $cups[0];
			$cups[0] = $cups[1];
			$cups[1] = $temp;
			break;
			case "B":
			$temp = $cups[1];
			$cups[1] = $cups[2];
			$cups[2] = $temp;
			break;
			case "C":
			$temp = $cups[0];
			$cups[0] = $cups[2];
			$cups[2] = $temp;
			break;
		}
		$i++;
	}
	$res = array_search(TRUE, $cups) + 1;
	fputs(STDOUT, $res);
}
?>