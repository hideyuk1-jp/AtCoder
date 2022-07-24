<?php

list($y) = ints();
list($m) = ints();
list($d) = ints();
$start = f($y, $m, $d);
$end = f(2014, 5, 17);
echo($end - $start) . PHP_EOL;
function f($y, $m, $d)
{
    if ($m <= 2) {
        --$y;
        $m += 12;
    }
    return 365 * $y + intdiv($y, 4) - intdiv($y, 100) + intdiv($y, 400) + intdiv(306 * ($m + 1), 10) + $d - 429;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
