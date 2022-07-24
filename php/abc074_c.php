<?php

list($a, $b, $c, $d, $e, $f) = ints();
$ans = [$a * 100, 0];
$max_con = 0;
for ($i = 0; $i <= $f; $i += 100 * $a) {
    for ($j = 0; $j <= $f - $i; $j += 100 * $b) {
        if ($i + $j === 0) {
            continue;
        }
        for ($k = 0; $k <= $f - $i - $j; $k += $c) {
            if ($k > $e * ($i + $j) / 100) {
                break;
            }
            $x = min($f - $i - $j - $k, ($i + $j) / 100 * $e - $k);
            $l = $d * intdiv($x, $d);
            $con = ($k + $l) / ($i + $j + $k + $l);
            if ($con > $max_con) {
                $ans = [$i + $j + $k + $l, $k + $l];
                $max_con = $con;
            }
        }
    }
}
echo implode(' ', $ans);

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
