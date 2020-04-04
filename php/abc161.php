<?php
// コンテスト参加 Dまで自力AC 1000 22:24 => パフォ 1060
// E
fscanf(STDIN, '%d %d %d', $n, $k, $c);
fscanf(STDIN, '%s', $s);

for ($i = 0; $i < $n; $i++) {
    if ($s[$i] === 'o') $sa[] = $i;
}

function proc($prev, $nissuu)
{
    global $sa, $n, $c;
    if ($prev + $c >= $n) return [];
    foreach ($sa as $v) {
        if ($v <= $prev + $c) continue;
        $arr[] = $v;
    }
    if (count($arr) === 0) return [];
}


exit;

// D
fscanf(STDIN, '%d', $k);
$arr = f();
// var_dump($arr);
echo $arr[$k - 1];

function f()
{
    global $k;
    $res = [];
    for ($i = 1; $i <= 9; $i++) {
        $res[] = $i;
    }
    $keta = 2;
    while (count($res) < $k) {
        for ($i = 1; $i <= 9; $i++) {
            $res = array_merge($res, getRunrun($i, $keta - 1));
        }
        $keta++;
    }
    sort($res);
    return $res;
}

function getRunrun($n, $keta)
{
    static $memo;
    if (isset($memo[$n][$keta])) return $memo[$n][$keta];
    for ($i = max($n - 1, 0); $i <= min($n + 1, 9); $i++) {
        $arr[] = (int) (strval($n) . strval($i));
    }
    if ($keta === 1) {
        $memo[$n][$keta] = $arr;
        return $arr;
    }
    $res = [];
    foreach ($arr as $v) {
        $tmp = getRunrun($v % 10, $keta - 1);
        foreach ($tmp as $v2) {
            $res[] = (int) (strval($n) . str_pad($v2, $keta, 0, STR_PAD_LEFT));
        }
    }
    $memo[$n][$keta] = $res;
    return $res;
}

exit;

// C
fscanf(STDIN, '%d %d', $n, $k);
if ($n === 0 || $n % $k === 0) {
    echo 0;
    exit;
}
if ($n > $k) $n %= $k;
echo ($n <= $k / 2) ? $n : $k - $n;

exit;

// B
fscanf(STDIN, '%d %d', $n, $m);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
rsort($a);
$sum = array_sum($a);
for ($i = 0; $i < $n; $i++) {
    if ($a[$i] < $sum * 1 / (4 * $m)) {
        $i--;
        break;
    }
}
echo ($i + 1 >= $m) ? 'Yes' : 'No';


exit;

// A
fscanf(STDIN, '%d %d %d', $a, $b, $c);
echo $c . ' ' . $a . ' ' . $b;
