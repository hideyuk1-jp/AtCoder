<?php

// arc017_c 半分全列挙
// 全体で全探索しても間に合わない場合に前半後半に分けて全探索して結果を合わせる
list($n, $x) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($w[]) = ints();
}
for ($i = 0; $i < 2 ** intdiv($n, 2); ++$i) {
    $t = 0;
    for ($j = 0; $j < intdiv($n, 2); ++$j) {
        if ($i >> $j & 1) {
            $t += $w[$j];
        }
    }
    if (isset($cnta[$t])) {
        ++$cnta[$t];
    } else {
        $cnta[$t] = 1;
    }
}
for ($i = 0; $i < 2 ** (intdiv($n, 2) + $n % 2); ++$i) {
    $t = 0;
    for ($j = 0; $j < (intdiv($n, 2) + $n % 2); ++$j) {
        if ($i >> $j & 1) {
            $t += $w[intdiv($n, 2) + $j];
        }
    }
    if (isset($cntb[$t])) {
        ++$cntb[$t];
    } else {
        $cntb[$t] = 1;
    }
}
$ans = 0;
foreach ($cnta as $i => $v) {
    $ans += $v * ($cntb[$x - $i] ?? 0);
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
