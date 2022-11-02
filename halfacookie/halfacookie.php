<?php
while (fscanf(STDIN, '%f%f%f', $r, $x, $y) === 3) {
    $d = sqrt($x**2 + $y**2);
    if ($d > $r) {
        $result = "miss";
    } else {
        /**
         * Find half the length of the chord
         * @var double
         */
        $chord_length = sqrt($r**2 - $d**2);
        /**
         * Find the area of the circle (pi*r^2)
         * @var double
         */
        $a_circle = pi()*$r**2;
        /**
         * Find the required angle of the right triangle made up by radius
         * (hypoteneuse), half the chord, and altitude of the chord.
         * @var double
         */
        $angle = rad2deg(asin($chord_length/$r));
        /**
         * Find the area of the sector of the circle the chord spans.
         * @var double
         */
        $a_sector = ($angle/180)*$a_circle;
        /**
         * Find the base of the right triangle (the altitude of the chord from
         * the circle's center)
         * @var double
         */
        $base = sqrt($r**2 - $chord_length**2);
        /**
         * Find the area of the right triangle. We need to multiply by 2 anyhow,
         * so we leave out the 1/2 of half base*height
         * @var double
         */
        $a_triangle = $chord_length * $base;
        /**
         * Sector's area - triangle's area gives us the small segment's area
         * @var double
         */
        $a_segment2 = $a_sector - $a_triangle;
        /**
         * Circle's area - small segment's area gives us the large segment's area
         * @var double
         */
        $a_segment1 = $a_circle - $a_segment2;
        /**
         * Format as large segment [space] small segment for output
         * @var double
         */
        $result = $a_segment1." ".$a_segment2;
    }
    fprintf(STDOUT, "%s\n", $result);
}
