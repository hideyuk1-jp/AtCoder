<?php
// バーチャル Dまで自力AC 1000 57:01 => 推定パフォ 1441
// D
fscanf(STDIN, '%d %d', $n, $x);
$cnt = [1];
$cnt_p = [1];
for ($i = 1; $i <= $n; $i++) {
    $cnt[] = $cnt[$i - 1] * 2 + 3;
    $cnt_p[] = $cnt_p[$i - 1] * 2 + 1;
}
echo f($n, $x);

function f($n, $x)
{
    global $cnt, $cnt_p;

    if ($n === 0) return min(1, $x);

    if ($x <= 1) return 0;
    if ($x <= ($cnt[$n] - 3) / 2 + 1) {
        return f($n - 1, $x - 1);
    }
    if ($x === ($cnt[$n] - 3) / 2 + 2) {
        return f($n - 1, $x - 2) + 1;
    }
    if ($x < $cnt[$n] - 1) {
        return $cnt_p[$n - 1] + 1 + f($n - 1, $x - (($cnt[$n] - 3) / 2 + 2));
    }
    return $cnt_p[$n - 1] * 2 + 1;
}

exit;

// C
fscanf(STDIN, '%d %d', $n, $k);
for ($i = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d', $h[]);
}
sort($h);
$ans = 10 ** 9;
for ($i = 0; $i < $n - $k + 1; $i++) {
    $ans = min($h[$i + $k - 1] - $h[$i], $ans);
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) fscanf(STDIN, '%d', $p[]);
echo array_sum($p) - max($p) / 2;

exit;

// A
fscanf(STDIN, '%d', $d);

if ($d === 25) {
    $ans = 'Christmas';
} elseif ($d === 24) {
    $ans = 'Christmas Eve';
} elseif ($d === 23) {
    $ans = 'Christmas Eve Eve';
} else {
    $ans = 'Christmas Eve Eve Eve';
}
echo $ans;
