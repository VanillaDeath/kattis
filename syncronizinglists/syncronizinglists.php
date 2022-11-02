<?php
while (fscanf(STDIN, '%d', $listlength) === 1 && $listlength != 0) {
	$list1i = 0;
	$list1 = array();
	while ($list1i < $listlength && fscanf(STDIN, '%d', $item) === 1) {
		$list1[] = $item;
		$list1i++;
	}
	$list2i = 0;
	$list2 = array();
	while ($list2i < $listlength && fscanf(STDIN, '%d', $item) === 1) {
		$list2[] = $item;
		$list2i++;
	}
	$list1_ = $list1;
	asort($list1);
	asort($list2);
	$list = array_combine($list1, $list2);
	foreach ($list1_ AS $item) {
		fprintf(STDOUT, "%d\n", $list[$item]);
	}
	fprintf(STDOUT, "\n");
}
?>