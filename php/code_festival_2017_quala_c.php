<?php

list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    list($a) = strs();
    for ($j = 0; $j < $w; ++$j) {
        if (isset($cnt[$a[$j]])) {
            ++$cnt[$a[$j]];
        } else {
            $cnt[$a[$j]] = 1;
        }
    }
}

$g1 = $h % 2 && $w % 2 ? 1 : 0;
$g2 = ($w % 2) * intdiv($h, 2) + ($h % 2) * intdiv($w, 2);
$g4 = intdiv($h, 2) * intdiv($w, 2);

for ($i = 1; $i <= $g1; ++$i) {
    foreach ($cnt as $k => $v) {
        if ($v % 4 === 1 || $v % 4 === 3) {
            $cnt[$k] -= 1;
            continue 2;
        }
    }
    exit('No');
}

for ($i = 1; $i <= $g2; ++$i) {
    foreach ($cnt as $k => $v) {
        if ($v % 4 === 2) {
            $cnt[$k] -= 2;
            continue 2;
        }
    }
    foreach ($cnt as $k => $v) {
        if ($v > 0 && $v % 4 === 0) {
            $cnt[$k] -= 2;
            continue 2;
        }
    }
    exit('No');
}

for ($i = 1; $i <= $g4; ++$i) {
    foreach ($cnt as $k => $v) {
        if ($v > 0 && $v % 4 === 0) {
            $cnt[$k] -= 4;
            continue 2;
        }
    }
    exit('No');
}

echo 'Yes';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
