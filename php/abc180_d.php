<?php

$debug = false;
[$X, $Y, $A, $B] = ints();
$s = $X;
$e = 0;
while (true) {
    if ($debug) {
        echo "s:${s}, e${e}\n";
    }
    if ($s >= $Y / $A && $s + $B >= $Y) {
        break;
    }

    if ($s < $Y / $A) {
        if (intdiv($s * ($A - 1), $B) >= 1) {
            $c = intdiv($s * ($A - 1), $B);
            if ($debug) {
                echo "select B * ${c}\n";
            }
            $s += $B * $c;
            $e += $c;
        } else {
            if ($debug) {
                echo "select A\n";
            }
            $s *= $A;
            $e++;
        }
    } else {
        $c = intdiv($Y - 1 - $s, $B);
        if ($debug) {
            echo "select B * ${c}\n";
        }
        $s += $B * $c;
        $e += $c;
    }
}
echo $e . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
