<?php
while (fscanf(STDIN, '%d', $num_cases) === 1) {
	$case = 1;
	while ($case <= $num_cases && fscanf(STDIN, '%s %s %s %d', $name, $start_date, $birth_date, $courses)) {
		// $eligibility = $courses >= 41 ? "ineligible" : ((date("Y", strtotime($start_date)) >= 2010 || date("Y", strtotime($birth_date)) >= 1991) ? "eligible" : "coach petitions");
		$eligibility = (intval(substr($start_date, 0, 4)) >= 2010 || intval(substr($birth_date, 0, 4)) >= 1991) ? "eligible" : ($courses >= 41 ? "ineligible" : "coach petitions");
		fprintf(STDOUT, "%s %s\n", $name, $eligibility);
		$case++;
	}
}
?>