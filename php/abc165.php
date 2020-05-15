<?php
// D
fscanf(STDIN, '%d %d %d', $a, $b, $n);
$x = min($b - 1, $n);
$ans = intdiv($a * $x, $b) - $a * intdiv($x, $b);
echo $ans;

exit;

// C
fscanf(STDIN, '%d %d %d', $n, $m, $q);
for ($i  = 0; $i < $q; $i++) fscanf(STDIN, '%d %d %d %d', $a[], $b[], $c[], $d[]);
func();
echo max($scores);

function func($a = [])
{
    global $n, $m, $scores;

    if (count($a) === $n) {
        $scores[] = calcScore($a);
        return;
    }

    $s = count($a) > 0 ? $a[count($a) - 1] : 1;
    for ($i = $s; $i <= $m; $i++) {
        func(array_merge($a, [$i]));
    }
}

function calcScore($arr)
{
    global $q, $a, $b, $c, $d;
    $sum = 0;
    for ($i = 0; $i < $q; $i++) {
        $sum += $arr[$b[$i] - 1] - $arr[$a[$i] - 1] === $c[$i] ? $d[$i] : 0;
    }
    return $sum;
}

exit;

// B
fscanf(STDIN, '%d', $x);
$ans = 0;
$zan = 100;
while (true) {
    $ans++;
    $zan = (int) ($zan * 1.01);
    if ($zan >= $x) break;
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d', $k);
fscanf(STDIN, '%d %d', $a, $b);
$ans = 'NG';
for ($i = $a; $i <= $b; $i++) {
    if ($i % $k === 0) {
        $ans = 'OK';
        break;
    }
}
echo $ans;
