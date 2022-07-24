<?php

list($n, $k) = ints();
if ($k > ($n - 1) * ($n - 2) / 2) {
    exit('-1');
}
// 1と他の点を繋ぐ、この時が最短距離2の点の組み合わせは最大となり n-1C2 通り
for ($i = 2; $i <= $n; ++$i) {
    $ans[] =  implode(' ', [1, $i]);
}
// 減らしたい数だけ直接繋ぐ
$r = ($n - 1) * ($n - 2) / 2 - $k;
for ($i = 2; $i <= $n - 1; ++$i) {
    for ($j = $i + 1; $j <= $n; ++$j) {
        if ($r === 0) {
            break 2;
        }
        $ans[] = implode(' ', [$i, $j]);
        --$r;
    }
}
echo count($ans) . PHP_EOL;
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
