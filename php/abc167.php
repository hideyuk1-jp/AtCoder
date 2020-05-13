<?php
// ABC167 コンテスト参加 DまでAC => 1000 71:28
// E
define('MOD', 998244353);
fscanf(STDIN, '%d %d %d', $n, $m, $k);
$kumi = dp($n);
echo $kumi;

function dp($n, $repeat = 0)
{
    global $m, $k;
    static $memo;

    if (isset($memo[$n][$repeat])) {
        return $memo[$n][$repeat];
    }

    if ($n === 1 && $repeat + 1 === $k) {
        $memo[$n][$repeat] = $m - 1;
        return $m - 1;
    }
    if ($n === 1 && $repeat + 1 < $k) {
        $memo[$n][$repeat] = $m;
        return $m;
    }

    $ret = 0;
    $ret += dp($n - 1, 0) * ($m - 1);
    if ($repeat + 1 < $k) $ret += dp($n - 1, $repeat + 1);

    $memo[$n][$repeat] = $ret;
    return $ret;
}

exit;

// D
fscanf(STDIN, '%d %d', $n, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$a = array_merge([null], $a);
$cur = 1;
$x[1] = 0;
$cnt = 0;
while (true) {
    $cur = $a[$cur];
    $cnt++;
    $k--;
    if (isset($x[$cur])) {
        $k %= $cnt - $x[$cur];
    } else {
        $x[$cur] = $cnt;
    }
    if ($k === 0) break;
}
echo $cur;

exit;

// C
fscanf(STDIN, '%d %d %d', $n, $m, $x);
for ($i = 0; $i < $n; $i++) {
    $a[] = array_map('intval', explode(' ', trim(fgets(STDIN))));
}
$ans = -1;
// bit全探索
for ($i = 0; $i < 2 ** $n; $i++) {
    $sum = array_fill(0, $m + 1, 0);
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            for ($k = 0; $k < $m + 1; $k++) {
                $sum[$k] += $a[$j][$k];
            }
        }
    }
    for ($j = 1; $j < $m + 1; $j++) {
        if ($sum[$j] < $x) continue 2;
    }
    if ($ans === -1) {
        $ans = $sum[0];
    } else {
        $ans = min($ans, $sum[0]);
    }
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d %d %d %d', $a, $b, $c, $k);
if ($k <= $a)  $ans = $k;
elseif ($k <= $a + $b) $ans = $a;
else $ans = $a - ($k - $a - $b);
echo $ans;

exit;

// A
fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%s', $t);

$ans = ($s === substr($t, 0, -1)) ? 'Yes' : 'No';
echo $ans;
