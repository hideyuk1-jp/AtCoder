<?php
[$N] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$x, $y, $p, $q] = ints();
    $ans[] = solve($x, $y, $p, $q);
}
echo implode(PHP_EOL, $ans);
function solve($x, $y, $p, $q)
{
    $train = $x;
    $takahashi = $p; // 目覚める時刻
    while (true) {
        while ($train + $y < $takahashi) {
            $train += 2 * $x + 2 * $y;
        }
        if ($takahashi <= $train && $takahashi + $q > $train) {
            return $train;
        }
        if ($takahashi > $train && $takahashi < $train + $y) {
            return $takahashi;
        }
        $gap = $train + $y - $takahashi;
        if (isset($used[$gap])) {
            return 'infinity';
        }
        $used[$gap] = true;
        $takahashi += $p + $q;
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
