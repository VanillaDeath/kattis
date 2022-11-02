<?php
function removeDuplicates($array) {
   $valueCount = array_count_values($array);

   $return = array();
   foreach ($valueCount as $value => $count) {
      if ( $count == 1 ) {
         $return[] = $value;
      }
   }

   return $return;
}
$case_num = 1;
while (fscanf(STDIN, '%d', $num_cases) === 1) {
	while (fscanf(STDIN, '%d', $num_guests) === 1 && fscanf(STDIN, '%[0-9 ]', $guests) === 1) {
		$guests = explode(" ", $guests);
		list($odd_man_out) = removeDuplicates($guests);
		fprintf(STDOUT, "Case #%d: %d\n", $case_num, $odd_man_out);
		$case_num++;
	}
}
?>