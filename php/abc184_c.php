<?php
// 必ず3手以内で到達可能
[$r1, $c1] = ints();
[$r2, $c2] = ints();
// 同じ座標は0
if ($r1 === $r2 && $c1 === $c2) exit("0");
// 1手で移動可能
if (($r2 - $r1) + ($c2 - $c1) === 0 || ($r2 - $r1) - ($c2 - $c1) === 0 || abs($r2 - $r1) + abs($c2 - $c1) <= 3) exit("1");
// 2手で移動可能
if (
    (($r2 - $r1) + ($c2 - $c1) <= 3 && ($r2 - $r1) + ($c2 - $c1) >= -3) ||
    (($r2 - $r1) - ($c2 - $c1) <= 3 && ($r2 - $r1) - ($c2 - $c1) >= -3) ||
    abs($r2 - $r1) + abs($c2 - $c1) <= 6 ||
    (($r2 - $r1) + ($c2 - $c1)) % 2 === 0
)
    exit("2");
// 残りは3手で移動可能
echo "3";
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
