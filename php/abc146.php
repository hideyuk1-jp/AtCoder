<?php

// バーチャル参加でCまでAC 600 38:16 => 推定パフォ1013

fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n - 1; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--;
    $b--;
    $count[$a]++;
    $count[$b]++;
    $g[$a][] = $b;
    $g[$b][] = $a; // 無向グラフの場合
    $a_arr[] = $a;
    $b_arr[] = $b;
}

dfs($a_arr[0], 0);

echo max($count) . PHP_EOL;
for ($i = 0; $i < $n - 1; $i++) {
    echo $color[$a_arr[$i]][$b_arr[$i]] . PHP_EOL;
}

function dfs($v = 0, $par_color)
{
    global $g, $seen, $color;

    $seen[$v] = true;
    if (is_null($g[$v])) {
        return;
    }

    $i = 1;
    foreach ($g[$v] as $to) {
        if ($seen[$to]) {
            continue;
        }
        if ($i === $par_color) {
            $i++;
        }
        // 彩色
        $color[$v][$to] = $color[$to][$v] = $i;
        dfs($to, $i);
        $i++;
    }
}

exit;

fscanf(STDIN, '%d %d %d', $a, $b, $x);
$left = 0;
$right = 10 ** 9 + 1;

while ($right - $left > 1) {
    $mid = (int) floor(($left + $right) / 2);
    $p = $a * $mid + $b * strlen($mid);
    if ($p <= $x) {
        $left = $mid;
    } else {
        $right = $mid;
    }
}
echo $left . PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
for ($i = 0; $i < 26; $i++) {
    $alpha[] = chr(65 + $i);
}
$ans = '';
$cnt = strlen($s);
for ($i = 0; $i < $cnt; $i++) {
    $ans .= $alpha[(array_search($s[$i], $alpha) + $n) % 26];
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%s', $s);
$youbi = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
echo(7 - array_search($s, $youbi)) . PHP_EOL;
