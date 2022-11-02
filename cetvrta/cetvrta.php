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
$x_list = array();
$y_list = array();
while (fscanf(STDIN, '%d %d', $x, $y) === 2) {
	$x_list[] = $x;
	$y_list[] = $y;
}
list($res_x) = removeDuplicates($x_list);
list($res_y) = removeDuplicates($y_list);
fprintf(STDOUT, "%d %d\n", $res_x, $res_y);
?>