<?php

/*
 * 二項演算
 */

$s = trim(fgets(STDIN)); // string 5+5
$match = '/[¥*-\/+]+/';
preg_match($match, $s, $matches);
list($op) = $matches;
list($m, $n) = preg_split($match, $s);

if ($m < 0)
    $m = 0;
if ($m > 1000)
    $m = 1000;
if ($n < 0)
    $n = 0;
if ($n > 1000)
    $n = 1000;
$ans = -10000;

switch ($op) {
    case "+";
        $ans = $m + $n;
        break;
    case "-";
        $ans = $m - $n;
        break;
    case "/";
        if ($n > 0) {
            $ans = floor($m / $n);
        }
        break;
    case "*";
        $ans = $m * $n;
        break;
}

echo $m . $op . $n . " = " . $ans;
