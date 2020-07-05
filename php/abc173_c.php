<?php
list($h, $w, $k) = ints();
$n = $h + $w;
for ($i = 0; $i < $h; ++$i) {
    list($s[]) = strs();
}
$ans = 0;
for ($i = 0; $i < 2 ** $n; ++$i) {
    for ($j = 0; $j < $n; ++$j) {
        if ($i >> $j & 1) {
            $ijs[$j] = 1;
        } else {
            $ijs[$j] = 0;
        }
    }
    $cnt = 0;
    for ($ii = 0; $ii < $h; ++$ii) {
        for ($jj = 0; $jj < $w; ++$jj) {
            if ($ijs[$ii] && $ijs[$jj + $h] && $s[$ii][$jj] === '#') {
                ++$cnt;
            }
        }
    }

    if ($cnt === $k) {
        ++$ans;
    }
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
