<?php
while (fscanf(STDIN, '%d', $num_messages) === 1) {
	$counter = 1;
	while ($counter <= $num_messages && fscanf(STDIN, '%s', $message) === 1) {
		$seg_length = ceil(sqrt(strlen($message)));
		$pad_length = pow($seg_length, 2);
		$message_padded = str_pad($message, $pad_length, "*");
		// $message_segments = str_split($message_padded, $seg_length);
		// perform operation to rotate 90 degrees
		$pos = $pad_length - $seg_length;
		$res = "";
		while (strlen($res) < $pad_length) {
			$res .= substr($message_padded, $pos, 1);
			$pos = $pos >= $seg_length ? $pos - $seg_length : $pos + $pad_length - $seg_length + 1;
		}
		$res = str_replace("*", "", $res);
		fprintf(STDOUT, "%s\n", $res);
		$counter++;
	}
}
?>