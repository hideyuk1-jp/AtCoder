<?php

list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    list($s[]) = strs();
}
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($s[$i][$j] === '#') {
            $a[$i][$j] = '#';
            continue;
        }
        $a[$i][$j] = 0;
        for ($l = max(0, $i - 1); $l <= min($h - 1, $i + 1); ++$l) {
            for ($m = max(0, $j - 1); $m <= min($w - 1, $j + 1); ++$m) {
                if ($s[$l][$m] === '#') {
                    $a[$i][$j]++;
                }
            }
        }
    }
    echo implode('', $a[$i]) . PHP_EOL;
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
