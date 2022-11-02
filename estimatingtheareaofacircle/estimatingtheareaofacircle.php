<?php
while (fscanf(STDIN, '%f %d %d', $radius, $marked, $in_circle) === 3 && $radius != 0) {
	$area = M_PI*(pow($radius, 2));
	$area_estimate = ($in_circle/$marked)*pow(($radius*2), 2);
	fprintf (STDOUT, "%f %f\n", $area, $area_estimate);
}
?>