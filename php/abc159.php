<?php

// コンテスト参加 Dまで自力AC 1000 49:47 => パフォ 920
// https://atcoder.jp/users/hideyuk1/history/share/abc159

// E
define('WHITE', '1');
define('BLACK', '0');
fscanf(STDIN, '%d %d %d', $h, $w, $k);
for ($i  = 0; $i < $h; $i++) {
    $s[] = trim(fgets(STDIN));
}

for ($i = 0; $i < $h; $i++) {
    for ($j = 0; $j < $w; $j++) {
        $w_sum[$i][$j] = ($w_sum[$i - 1][$j] ?? 0) + ($w_sum[$i][$j - 1] ?? 0) - ($w_sum[$i - 1][$j - 1] ?? 0);
        if ($s[$i][$j] === WHITE) {
            $w_sum[$i][$j]++;
        }
    }
}

$min = $h + $w;
// bit全探索 横方向のカット
for ($i = 0; $i < 2 ** ($h - 1); $i++) {
    $h_cut = [];
    for ($j = 0; $j < $h - 1; $j++) {
        if (($i >> $j) & 1) {
            $h_cut[] = $j;
        }
    }

    // 貪欲 縦方向のカット
    $w_cut = [];
    $flag = true;
    for ($j = 0; $j < $w; $j++) {
        if (cnt_white($j) > $k) {
            if (count($w_cut) > 0 && $w_cut[count($w_cut) - 1] === $j - 1) {
                $flag = false;
                break;
            }
            if ($j === 0) {
                $flag = false;
                break;
            }
            $w_cut[] = $j - 1;
        }
    }
    if ($flag) {
        $min = min(count($h_cut) + count($w_cut), $min);
    }
}

echo $min . PHP_EOL;

// $i番目を縦方向に割った場合に左側1列のそれぞれのチョコのホワイトチョコブロック数の最大値を返す
function cnt_white($i)
{
    global $h, $w_sum, $h_cut, $w_cut;

    $top = -1;
    $max = 0;
    $left = $w_cut[count($w_cut) - 1] ?? -1;
    $right = $i;
    foreach ($h_cut as $bottom) {
        $cnt = $w_sum[$bottom][$right] - ($w_sum[$top][$right] ?? 0) - ($w_sum[$bottom][$left] ?? 0) + ($w_sum[$top][$left] ?? 0);
        $max = max($cnt, $max);
        $top = $bottom;
    }
    $bottom = $h - 1;
    $cnt = $w_sum[$bottom][$right] - ($w_sum[$top][$right] ?? 0) - ($w_sum[$bottom][$left] ?? 0) + ($w_sum[$top][$left] ?? 0);
    $max = max($cnt, $max);

    return $max;
}

exit;

// D
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
for ($i = 0; $i < $n; $i++) {
    if (isset($cnt[$a[$i]])) {
        $cnt[$a[$i]]++;
    } else {
        $cnt[$a[$i]] = 1;
    }
}
$kumi_sum = 0;
foreach ($cnt as $i => $v) {
    $kumi_sum += $v * ($v - 1) / 2;
}
for ($i = 0; $i < $n; $i++) {
    $ans[] = $kumi_sum - ($cnt[$a[$i]] - 1);
}
echo implode(PHP_EOL, $ans);

exit;

// C
fscanf(STDIN, '%d', $l);
$ans = 0;
$r = $l / 3;
echo $r ** 3;

exit;

// B
fscanf(STDIN, '%s', $s);
$n = strlen($s);
$ans = 'Yes';
if (!isKaibun($s)) {
    $ans = 'No';
}

$st = substr($s, 0, ($n - 1) / 2);
if (!isKaibun($st)) {
    $ans = 'No';
}

$st = substr($s, ($n + 3) / 2 - 1, $n - ($n + 3) / 2 + 1);
if (!isKaibun($st)) {
    $ans = 'No';
}

echo $ans . PHP_EOL;

function isKaibun($s)
{
    $n = strlen($s);
    for ($i = 0; $i < intdiv($n, 2); $i++) {
        if ($s[$i] !== $s[$n - $i - 1]) {
            return false;
        }
    }
    return true;
}

exit;

// A
fscanf(STDIN, '%d %d', $n, $m);
$ans = $n * ($n - 1) / 2 + $m * ($m - 1) / 2;
echo $ans . PHP_EOL;
