<?php

[$N, $M, $Q] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$w[], $v[]] = ints();
}
array_multisort($v, SORT_DESC, $w);
$x = ints();
for ($i = 0; $i < $Q; ++$i) {
    [$l, $r] = ints();
    $l--;
    $r--;
    $_x = $x;
    array_splice($_x, $l, $r - $l + 1);
    sort($_x);
    if (count($_x) === 0) {
        $ans[] = 0;
        continue;
    }
    $_ans = 0;
    $used = [];
    for ($j = 0; $j < count($_x); ++$j) {
        for ($k = 0; $k < $N; ++$k) {
            if (isset($used[$k])) {
                continue;
            }
            if ($_x[$j] >= $w[$k]) {
                $_ans += $v[$k];
                $used[$k] = true;
                break;
            }
        }
    }
    $ans[] = $_ans;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
