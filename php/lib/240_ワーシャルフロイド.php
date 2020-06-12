<?php
// ワーシャルフロイド
// abc079_d
list($h, $w) = ints();
for ($i = 0; $i < 10; ++$i)
    foreach (ints() as $j => $v) $d[$i][$j] = $v;
warshallFloyd(10);
$ans = 0;
for ($i = 0; $i < $h; ++$i)
    foreach (ints() as $v) $ans += $v !== -1 ? $d[$v][1] : 0;
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

function warshallFloyd($n)
{
    global $d;
    for ($k = 0; $k < $n; ++$k) { // 経由点
        for ($i = 0; $i < $n; ++$i) { // 始点
            for ($j = 0; $j < $n; ++$j) { // 終点
                $d[$i][$j] = min($d[$i][$j], $d[$i][$k] + $d[$k][$j]);
            }
        }
    }
}
