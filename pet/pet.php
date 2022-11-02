<?php
function doublemax($mylist){ 
  $maxvalue=max($mylist); 
  while(list($key,$value)=each($mylist)){ 
    if($value==$maxvalue)$maxindex=$key; 
  } 
  return array("value"=>$maxvalue,"index"=>$maxindex); 
}
$scores = array();
while ($score_set = fscanf(STDIN, '%d %d %d %d')) {
	$scores[] = array_sum($score_set);
}
fprintf(STDOUT, "%d %d", doublemax($scores)["index"]+1, doublemax($scores)["value"]);
?>