<?php
while (fscanf(STDIN, "%d %d %d", $n1, $n2, $n3) === 3) {
	$operators = array("+", "-", "*", "/");
	foreach($operators AS $operator) {
		if (eval("return ".$n1.$operator.$n2.";") == $n3) {
			fprintf(STDOUT, "%d%s%d%s%d\n", $n1, $operator, $n2, "=", $n3);
			break;
		} elseif (eval("return ".$n2.$operator.$n3.";") == $n1) {
			fprintf(STDOUT, "%d%s%d%s%d\n", $n1, "=", $n2, $operator, $n3);
			break;
		}
	}
}
?>