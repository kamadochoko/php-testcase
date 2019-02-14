<?php

/*
 * get Bowling score.
 */

while ($input = fgets(STDIN)) {
    $s[] = trim($input);
}

if ($s[0] < 12)
    $s[0] = 12;
if ($s[0] > 21)
    $s[0] = 21;

$n = $s[0]; // 投数
$nm_list = explode(' ', $s[1]); // 倒れたピン数 1フレーム2投
// スコア、スペアボーナス、ストライクボーナス
$score = 0;
for ($i = 0, $j = 1; $j <= 9; $j++) {
    if ($nm_list[$i] == 10) {
        $score += $nm_list[$i] + $nm_list[$i + 1] + $nm_list[$i + 2];
        $i++;
    } else
    if ($nm_list[$i] + $nm_list[$i + 1] == 10) {
        $score += $nm_list[$i] + $nm_list[$i + 1] + $nm_list[$i + 2];
        $i += 2;
    } else {
        $score += $nm_list[$i] + $nm_list[$i + 1];
        $i += 2;
    }
}
// TODO スコアの整合検証

// 算出されるスコア
$score2 = 0;
for ($k = $i; $k < $n; $k++) {
    $score2 += $nm_list[$k];
}
echo $score + $score2;
