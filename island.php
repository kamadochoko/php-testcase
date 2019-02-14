<?php

/*
 * 標準入力から'0'は海、'1'は陸地の10 x 10 マスの地図データを取得する。
 * 海に囲まれている繋がった陸地の固まりを1つの島として扱うとき、島の数を求める。
 */

$squares = 10;
while (true) {
    if (feof(STDIN)) {
        break;
    }
    $field = [];
    for ($i = 0; $i < $squares; $i++) {
        $field[] = str_split(rtrim(fgets(STDIN)));
    }
    fscanf(STDIN, '');

    $island_count = 0;
    for ($i = 0; $i < $squares; $i++) {
        for ($j = 0; $j < $squares; $j++) {
            if ($field[$i][$j] === '1') {
                $field = valid($field, [$i, $j]);
                $island_count++;
            }
        }
    }
    echo $island_count . PHP_EOL; // 船長！島を発見しました！
}

// 上下左右検証してfieldを返す
function valid($field, $s) {
    $stack = [$s];
    $x = [1, -1, 0, 0];
    $y = [0, 0, 1, -1];
    while (count($stack)) {
        $node = array_pop($stack);
        $field[$node[0]][$node[1]] = '0';
        for ($i = 0; $i < 4; $i++) {
            $nx = $node[1] + $x[$i];
            $ny = $node[0] + $y[$i];
            if (!isset($field[$ny][$nx]) || $field[$ny][$nx] === '0') {
                continue;
            }
            $stack[] = [$ny, $nx];
        }
    }
    return $field;
}
