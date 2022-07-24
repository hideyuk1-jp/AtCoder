<?php

list($n, $d, $k) = ints();
for ($i = 0; $i < $d; ++$i) {
    list($l[], $r[]) = ints();
}
for ($i = 0; $i < $k; ++$i) {
    list($s, $t) = ints();
    for ($j = 0; $j < $d; ++$j) {
        if ($s < $t) {
            if ($s >= $l[$j] && $s <= $r[$j]) {
                $s = $r[$j];
            }
            if ($s >= $t) {
                break;
            }
        } else {
            if ($s >= $l[$j] && $s <= $r[$j]) {
                $s = $l[$j];
            }
            if ($s <= $t) {
                break;
            }
        }
    }
    $ans[] = $j + 1;
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
