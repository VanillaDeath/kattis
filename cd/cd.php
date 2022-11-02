<?php
$f = fopen('php://stdin', 'r');
stream_set_read_buffer($f, 8 * 1024);
stream_set_chunk_size($f, 8 * 1024);
while ($count = fgets($f)) {
	list($jack, $jill) = explode(" ", $count);
	if ($jack == 0 && $jill == 0) {
		break;
	}
	$cd_num = 0;
	$jack_ids = new SplFixedArray($jack);
	while ($cd_num < $jack && $jack_id = (int) fgets($f)) {
		$jack_ids[$cd_num] = $jack_id;
		$cd_num++;
	}
	$res = 0;
	$cd_num = 0;
	$i = 0;
	while ($cd_num < $jill && $jill_id = (int) fgets($f)) {
		while ($i < $jack - 1 && $jack_ids[$i] < $jill_id) {
			$i++;
		}
		if ($jack_ids[$i] === $jill_id) {
			$res++;
		}
		$cd_num++;
	}
	fputs(STDOUT, "$res\n");
}
?>