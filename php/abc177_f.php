<?php

list($h, $w) = ints();
$cur = 1;
$cnt = 0;
for ($i = 1; $i <= $h; ++$i) {
    list($a, $b) = ints();
    if ($cur < $a || $cur > $b) {
        ++$cnt;
    }
    if ($cur <= $b) {
        if ($i > 0) {
            $cnt += $b - $cur + 1;
        }
        $cur = $b + 1;
    }
    if ($cur > $w) {
        $ans[] = -1;
    } else {
        $ans = $cnt;
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
