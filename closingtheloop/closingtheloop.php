<?php
while (fscanf(STDIN, '%d', $num_cases) === 1) {
    $case_num = 1;
    while (fscanf(STDIN, '%d', $num_segments) === 1) {
        $segments = trim(fgets(STDIN));
        $segments = explode(" ", $segments);
        $each = array("R" => array(), "B" => array());
        foreach ($segments as $segment) {
            $each[substr($segment, -1)][] = (int)substr($segment, 0, -1);
        }
        fprintf(STDOUT, "Case #%d: ", $case_num);
        rsort($each["R"]);
        rsort($each["B"]);
        $result = 0;
        $num_loops = min(array(count($each["R"]), count($each["B"]))) * 2;
        $curr = count($each["R"]) > count($each["B"]) ? "R" : "B";
        $i = 0;
        while ($i < $num_loops) {
            $result += array_shift($each[$curr]) - 1;
            $curr = ($curr == "R" ? "B" : "R");
            $i++;
        }
        fprintf(STDOUT, "%d\n", $result);
        $case_num++;
    }
}
