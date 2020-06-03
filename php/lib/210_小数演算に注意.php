<?php
// 小数は2進数で表現する関係上誤差が発生するので注意する
echo intval(0.29 * 100) . PHP_EOL;
// 結果: 28
// 本当は29になってほしい

// 対処法: "."を除外して整数にしてから処理する
echo intval(str_replace('.', '', strval(0.29))) . PHP_EOL;
// 結果: 29

function floorFloat($n)
{
    $x = explode('.', strval($n));
    return intval($x[0]);
}

function ceilFloat($n)
{
    $x = explode('.', strval($n));
    return isset($x[1]) && intval($x[1]) > 0 ? intval($x[0]) + 1 : intval($x[0]);
}
