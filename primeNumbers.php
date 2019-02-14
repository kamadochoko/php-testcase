<?php

/*
 * s以上s2以下の素数をすべて一行ずつ改行をして出力する。
 */

$s = trim(fgets(STDIN));
$s2 = trim(fgets(STDIN));

if ($s <= 1) {
    $s = 1;
}
if ($s >= pow(10, 3)) {
    $s = pow(10, 3);
}
if ($s2 <= 1) {
    $s2 = 1;
}
if ($s2 >= pow(10, 3)) {
    $s2 = pow(10, 3);
}
// s2の方がsより大きいためerrorと出力する
if ($s > $s2) {
    echo "error\n";
    exit;
}

$prime = [];
for ($i = $s; $i <= $s2; $i++) {
    if (validPrimeNumber($i)) {
        array_push($prime, $i);
    }
}

if (empty($prime)) {
    echo "0\n";
    exit;
}
// 取得した素数の出力
foreach ($prime as $value) {
    echo $value . "\n";
}

// 素数の検証
function validPrimeNumber($target) {
    // マイナス符号を無視
    $target = abs($target);

    // 1以下は素数ではない
    if ($target < 2) {
        return false;
    }

    // 対象数値の平方根までの整数で割り切れる数値は素数でない
    $max = floor(sqrt($target));
    for ($i = 2; $i <= $max; $i++) {
        if ($target % $i == 0) {
            return false;
        }
    }
    return true;
}
