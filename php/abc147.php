<?php

// バーチャル参加でCまでAC 600 69:22 => 推定パフォーマンス999

define('MOD', 10 ** 9 + 7);
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($k = 0; $k < 60; $k++) {
    $cnt_1 = 0;
    for ($i = 0; $i < $n; $i++) {
        if (($a[$i] >> $k) & 1) {
            $cnt_1++;
        }
    }
    $ans = modAdd($ans, modMul(modMul($n - $cnt_1, $cnt_1), modPow(2, $k)));
}
echo $ans . PHP_EOL;

// 足し算
function modAdd($x, $y)
{
    return ($x + $y) % MOD;
}

// 引き算
function modSub($x, $y)
{
    return ($x + MOD - $y) % MOD;
}

// 掛け算
function modMul($x, $y)
{
    return ($x * $y) % MOD;
}

// 割り算
function modDiv($x, $y)
{
    return modMul($x, modPow($y, MOD - 2));
}

// 累乗（繰り返し二乗法）
function modPow($n, $x)
{
    if ($x === 0) {
        return 1;
    }
    $res = (modPow($n, $x >> 1) ** 2) % MOD;
    if ($x % 2 === 1) {
        $res = modMul($res, $n);
    }
    return $res;
}

exit;

fscanf(STDIN, '%d', $n);
$g = array_fill(0, $n, []);
for ($i = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d', $a);
    for ($j = 0; $j < $a; $j++) {
        fscanf(STDIN, '%d %d', $x, $y);
        $x--; // 添字 0から
        $g[$i][] = [$x, $y];
    }
}

// bit全探索
// 1: 正直者 0:不親切
$ans = 0;
for ($i = 2 ** $n - 1; $i >= 0; $i--) {
    $flag = true;
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            foreach ($g[$j] as $v) {
                if ($v[1] !== (($i >> $v[0]) & 1)) {
                    $flag = false;
                    break 2;
                }
            }
        }
    }
    $cnt = 0;
    if ($flag) {
        for ($j = 0; $j < $n; $j++) {
            if (($i >> $j) & 1) {
                $cnt++;
            }
        }
    }
    $ans = max($ans, $cnt);
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%s', $s);
$n = strlen($s);
$ans = 0;
for ($i = 0; $i < $n / 2; $i++) {
    if ($s[$i] !== $s[$n - 1 - $i]) {
        $ans++;
    }
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d %d', $a1, $a2, $a3);
$ans = $a1 + $a2 + $a3 >= 22 ? 'bust' : 'win';
echo $ans . PHP_EOL;
