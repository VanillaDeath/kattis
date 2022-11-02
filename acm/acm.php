<?php
function problemGetsSolved ($array, $searchFor) {
	return array_filter($array, function($element) use($searchFor){
	  return isset($element['problem']) && $element['problem'] == $searchFor && $element['right'] === TRUE;
	});
}
$num_solved = 0;
$time_score = 0;
$problems = array();
while (fscanf(STDIN, '%d %s %s', $duration, $problem, $is_right) === 3 && $duration != -1) {
	$is_right = $is_right == "right" ? TRUE : FALSE;
	$num_solved += $is_right ? 1 : 0;
	$problems[] = array ("time" => $duration, "problem" => $problem, "right" => $is_right);
}
foreach ($problems AS $problem) {
	$time_score += $problem["right"] === TRUE ? $problem["time"] : (count(problemGetsSolved($problems, $problem["problem"])) > 0 ? 20 : 0);
}
fprintf(STDOUT, "%d %d\n", $num_solved, $time_score);
?>