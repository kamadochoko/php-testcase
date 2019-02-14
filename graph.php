<?php

/*
 * output:

  000000
  100000
  110000
  111000
  111100
  111110
  111111

 */

$n = (int) trim(fgets(STDIN)); // 6
for ($m = 1; $m <= $n + 1; $m++) {
    $l = (int) $n - ($n - $m + 1);
    for ($x = 1; $x <= $n; $x++) {
        if ($x > $l) {
            echo "0";
        } else {
            echo "1";
        }
    }
    echo "\n";
}
