<?php
function recursive_array_search($needle, $haystack)
{
    foreach ($haystack as $key=>$value) {
        $current_key=$key;
        if ($needle===$value or (is_array($value) && recursive_array_search($needle, $value) !== false)) {
            return $current_key;
        }
    }
    return false;
}
$keys = array(
    ["A"],
    ["A#", "Bb"],
    ["B"],
    ["C"],
    ["C#", "Db"],
    ["D"],
    ["D#", "Eb"],
    ["E"],
    ["F"],
    ["F#", "Gb"],
    ["G"],
    ["G#", "Ab"]
);
$case_num = 1;
while (fscanf(STDIN, "%s%s", $key, $tonality) === 2) {
    $location = recursive_array_search($key, $keys);
    $result = count($keys[$location]) === 1 ? "UNIQUE" : $keys[$location][array_search($key, $keys[$location]) === 0 ? 1 : 0]." ".$tonality;
    fprintf(STDOUT, "Case %d: %s\n", $case_num, $result);
    $case_num++;
}
