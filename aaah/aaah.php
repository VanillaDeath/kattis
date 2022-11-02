<?php
fscanf(STDIN, '%s', $ah1);
fscanf(STDIN, '%s', $ah2);
fprintf(STDOUT, "%s\n", strlen($ah1) >= strlen($ah2) ? "go" : "no");
