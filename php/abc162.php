<?php
// D
fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
// RGBの個数の累積和
$c['R'][0] = $c['G'][0] = $c['B'][0] = 0;
for ($i = 0; $i < $n; $i++) {
    foreach (array_keys($c) as $k) {
        $c[$k][$i + 1] = $c[$k][$i];
        if ($k === $s[$i]) $c[$k][$i + 1]++;
    }
}
$ans = 0;
for ($i = 1; $i < $n - 1; $i++) {
    $s1 = array_pop(array_diff(array_keys($c), [$s[$i]]));
    $s2 = array_pop(array_diff(array_keys($c), [$s[$i], $s1]));
    $ans += $c[$s1][$i] * ($c[$s2][$n] - $c[$s2][$i + 1]);
    $ans += $c[$s2][$i] * ($c[$s1][$n] - $c[$s1][$i + 1]);
    for ($j = 1; $j <= $n; $j++) {
        if ($i - $j < 0 || $i + $j >= $n) break;
        if ($s[$i - $j] !== $s[$i] && $s[$i] !== $s[$i + $j] && $s[$i - $j] !== $s[$i + $j]) $ans--;
    }
}
echo $ans;

exit;

// C
fscanf(STDIN, '%d', $K);
for ($i = 1; $i <= $K; $i++) {
    for ($j = $i; $j <= $K; $j++) {
        $gcd[$i][$j] = $gcd[$j][$i] = gcd($i, $j);
    }
}
$ans = 0;
for ($i = 1; $i <= $K; $i++) {
    for ($j = $i + 1; $j <= $K; $j++) {
        $gij = $gcd[$i][$j];
        $ans += $gij * 6;
        for ($k = $j + 1; $k <= $K; $k++) {
            $ans += $gcd[$gij][$k] * 6;
        }
    }
}
$ans += (1 + $K) * $K / 2;
echo $ans;

// 最大公約数（2つ）
function gcd($m, $n)
{
    if (!$n) return $m;
    return gcd($n, $m % $n);
}

// 最大公約数（3つ以上）
function gcdAll($arr)
{
    $gcd = array_pop($arr);
    foreach ($arr as $a) {
        $gcd = gcd($gcd, $a);
    }
    return $gcd;
}

exit;

// B
fscanf(STDIN, '%d', $n);
$ans = 0;
for ($i = 1; $i <= $n; $i++) {
    if ($i % 3 !== 0 && $i % 5 !== 0) $ans += $i;
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d', $n);
$ans = strpos(strval($n), '7') !== false ? 'Yes' : 'No';
echo $ans;
