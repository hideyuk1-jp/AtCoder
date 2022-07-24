<?php

list($h, $w, $n) = ints();
list($sr, $sc) = ints();
list($s) = strs();
list($t) = strs();
// マス上に残っていられる範囲を縦横それぞれで求める
$minh = $minw = 1;
$maxh = $h;
$maxw = $w;
for ($i = $n - 1; $i >= 0; --$i) {
    if ($t[$i] === 'D') {
        $minh = max($minh - 1, 1);
    }
    if ($t[$i] === 'U') {
        $maxh = min($maxh + 1, $h);
    }
    if ($t[$i] === 'R') {
        $minw = max($minw - 1, 1);
    }
    if ($t[$i] === 'L') {
        $maxw = min($maxw + 1, $w);
    }

    if ($s[$i] === 'D') {
        --$maxh;
    }
    if ($s[$i] === 'U') {
        ++$minh;
    }
    if ($s[$i] === 'R') {
        --$maxw;
    }
    if ($s[$i] === 'L') {
        ++$minw;
    }

    // マス上に残っていられる最大値より最小値が大きくなる＝その時点でどこにいてもマス上には残れない
    if ($minh > $maxh || $minw > $maxw) {
        exit('NO');
    }
}
// 縦横それぞれでマス上に残っていられる範囲に初期位置が含まれていればOK
echo($minh <= $sr && $sr <= $maxh) && ($minw <= $sc && $sc <= $maxw) ? 'YES' : 'NO';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
