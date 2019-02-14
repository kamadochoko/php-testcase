<?php

/*
 * 与えられた偶数桁sの数字を2倍にする。
 * 結果が2桁の場合1の位と10の位の数字を足した値を使用する。
 * 奇数桁各桁の数値の総和算出する。
 */
$s = (int) trim(fgets(STDIN));
$sum = 0;
$multi = 10;

$max_len = strlen($s);
for ($i = 0; $i < $max_len; $i++) {
    if ($s[$i] == "?") {
        break;
    }
    $word = (int) $s[$i];
    $s_ans = $word;
    if ($i % 2 == 0) {
        $s_ans *= 2;
        // 10の位
        if ($s_ans >= $multi) {
            $arr = str_split($s_ans);
            $s_ans = $arr[0] + $arr[1];
        }
    }
    $s[$i] = $s_ans;
    $sum += $s_ans;
}

// 総和は10で割り切れる。
echo $multi - $sum % $multi;
