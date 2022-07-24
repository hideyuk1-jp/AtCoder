<?php

list($n, $a, $b, $c, $d) = ints();
$a--;
$b--;
$c--;
$d--;
list($s) = strs();
$maxwa = $cntwa = $maxwb = $cntwb = $maxr = $cntr = 0;
for ($i = 0; $i < $n; ++$i) {
    // Aが通る範囲の連続する岩の最大数
    // 1以下でないとたどり着けない
    if ($i > $a && $i < $c) {
        if ($s[$i] === '#') {
            $cntwa++;
        } else {
            $cntwa = 0;
        }
    }
    $maxwa = max($maxwa, $cntwa);

    // Bが通る範囲の連続する岩の最大数
    // 1以下でないとたどり着けない
    if ($i > $b && $i < $d) {
        if ($s[$i] === '#') {
            $cntwb++;
        } else {
            $cntwb = 0;
        }
    }
    $maxwb = max($maxwb, $cntwb);

    // Bが通る範囲に左右一つずつ足した範囲の連続する何もないマスの最大数
    // C>Bの場合にこれが3以上ないとAがBを追い越すことが出来ない
    if ($i >= $b - 1 && $i <= $d + 1) {
        if ($s[$i] === '.') {
            $cntr++;
        } else {
            $cntr = 0;
        }
    }
    $maxr = max($maxr, $cntr);
}
if ($c > $d) {
    echo max($maxwa, $maxwb) <= 1 && $maxr >= 3 ? 'Yes' : 'No';
} else {
    echo max($maxwa, $maxwb) <= 1 ? 'Yes' : 'No';
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
