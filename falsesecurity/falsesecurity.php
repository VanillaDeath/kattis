<?php
while (fscanf(STDIN, '%s', $encoded_message) === 1) {
    $encoding = array(
        "a" => ".-", "b" => "-...", "c" => "-.-.", "d" => "-..",
        "e" => ".", "f" => "..-.", "g" => "--.", "h" => "....",
        "i" => "..", "j" => ".---", "k" => "-.-", "l" => ".-..",
        "m" => "--", "n" => "-.", "o" => "---", "p" => ".--.",
        "q" => "--.-", "r" => ".-.", "s" => "...", "t" => "-",
        "u" => "..-", "v" => "...-", "w" => ".--", "x" => "-..-",
        "y" => "-.--", "z" => "--..", "_" => "..--", "." => "---.",
        "," => ".-.-", "?" => "----"
    );
    $length = strlen($encoded_message);
    $i = 0;
    $decode_phase1 = $numbers = "";
    while ($i < $length) {
        $char = $encoding[strtolower(substr($encoded_message, $i, 1))];
        $decode_phase1 .= $char;
        $numbers = strlen($char).$numbers;
        $i++;
    }
    $i = 0;
    $decode_phase2 = "";
    while ($i < $length) {
        $char = substr($decode_phase1, 0, $numbers[$i]);
        $decode_phase1 = substr($decode_phase1, $numbers[$i]);
        $decode_phase2 .= strtoupper(array_search($char, $encoding));
        $i++;
    }
    fprintf(STDOUT, "%s\n", $decode_phase2);
}
