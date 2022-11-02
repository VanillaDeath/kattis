<?php
while (fscanf(STDIN, "%d%d%d", $kang[0], $kang[1], $kang[2])) {
    $i = 0;
    while ($kang[1]-$kang[0] > 1 || $kang[2]-$kang[1] > 1) {
        if ($kang[1]-$kang[0] > $kang[2]-$kang[1]) {
            $temp = $kang[2];
            $kang[2] = $kang[1];
            $kang[1] = $kang[2]-1;
        } else {
            $temp = $kang[0];
            $kang[0] = $kang[1];
            $kang[1] = $kang[0]+1;
        }
        $i++;
    }
    fprintf(STDOUT, "%d\n", $i);
}
