<?php

// コンテスト参加 EまでAC
// F
define("MOD", 10 ** 9 + 7);
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n - 1; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $g[$a][] = $b;
    $g[$b][] = $a; // 無向グラフの場合
}
dfs1(1);
dfs2(1);
$ans = [];
for ($i = 1; $i <= $n; $i++) {
    $ans[] = $dp[$i][-1]['value'];
}
echo implode(PHP_EOL, $ans);

function dfs1($v, $par = -1)
{
    global $g, $dp;

    $size = 0;
    $value = 1;
    foreach ($g[$v] as $to) {
        if ($to === $par) {
            continue;
        }
        dfs1($to, $v);
        $size += $dp[$to][$v]['size'];
        $value = modMul($value, $dp[$to][$v]['value']);
        $value = modMul($value, nCr($size, $dp[$to][$v]['size']));
    }
    $size++;
    $dp[$v][$par] = compact('value', 'size');
}

function dfs2($v, $par = -1)
{
    global $g, $dp;

    $size = $dp[$v][-1]['size'];
    foreach ($g[$v] as $to) {
        if ($to === $par) {
            continue;
        }
        $value = modMul($dp[$v][-1]['value'], $dp[$to][$v]['size']);
        $value = modDiv($value, $size - $dp[$to][$v]['size']);
        $dp[$to][-1] = compact('value', 'size');
        dfs2($to, $v);
    }
}

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

// 階乗
function modFac($n)
{
    if ($n === 0) {
        return 1;
    }
    return modMul($n, modFac($n - 1));
}

// 順列
function nPr($n, $r)
{
    if ($r === 0) {
        return 1;
    }
    return modDiv(modFac($n), modFac($n - $r));
}

// 組み合わせ
function nCr($n, $r)
{
    $r = min($r, $n - $r);
    if ($r === 0) {
        return 1;
    }
    return modDiv(nPr($n, $r), modFac($r));
}

exit;

// E
fscanf(STDIN, '%d %d %d %d %d', $x, $y, $a, $b, $c);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));
$q = array_map('intval', explode(' ', trim(fgets(STDIN))));
$r = array_map('intval', explode(' ', trim(fgets(STDIN))));

rsort($p);
rsort($q);

$pp = array_splice($p, 0, $x);
$qq = array_splice($q, 0, $y);

$arr = array_merge($pp, $qq, $r);

rsort($arr);
$arr = array_splice($arr, 0, $x + $y);

$ans = array_sum($arr);
echo $ans;

exit;

// D
fscanf(STDIN, '%d %d %d', $n, $x, $y);
for ($i  = 0; $i < $n - 1; $i++) {
    $g[$i][] = $i + 1;
    $g[$i + 1][] = $i; // 無向グラフの場合
}
$x--;
$y--;
$g[$x][] = $y;
$g[$y][] = $x; // 無向グラフの場合

for ($i = 0; $i < $n - 1; $i++) {
    $dist = bfs($i);
    for ($j = $i + 1; $j < $n; $j++) {
        if (isset($ans[$dist[$j]])) {
            $ans[$dist[$j]]++;
        } else {
            $ans[$dist[$j]] = 1;
        }
    }
}
for ($i = 1; $i < $n; $i++) {
    echo($ans[$i] ?? 0) . PHP_EOL;
}

function bfs($x)
{
    global $g, $n;
    // BFS（幅優先探索）：最短経路アルゴリズムとして活用
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    $dist[$x] = 0; // 頂点0からの距離格納配列
    $q->enqueue($x); // キューに0を追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();

        foreach ($g[$v] as $next_v) {
            if ($dist[$next_v] !== -1) {
                continue;
            } // 発見済み

            $dist[$next_v] = $dist[$v] + 1;
            $q->enqueue($next_v);
        }
    }
    return $dist;
}


exit;

// C
fscanf(STDIN, '%d %d', $k, $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$max = 0;
for ($i = 0; $i < $n; $i++) {
    if ($i !== 0) {
        $max = max($a[$i] - $a[$i - 1], $max);
    } else {
        $max = max($k + $a[$i] - $a[$n - 1], $max);
    }
}
echo $k - $max;

exit;

// B
fscanf(STDIN, '%d', $x);
$ans = 0;
$ans += intdiv($x, 500) * 1000;
$x %= 500;
$ans += intdiv($x, 5) * 5;
echo $ans;

exit;

// A
fscanf(STDIN, '%s', $s);
$ans = 'No';
if ($s[2] === $s[3] && $s[4] === $s[5]) {
    $ans = 'Yes';
}
echo $ans;
