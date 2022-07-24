<?php

list($n, $a, $b) = ints();
list($s) = strs();
$cnt = $cntb = 0;

for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'a') {
        if ($cnt < $a + $b) {
            $ans[] = 'Yes';
            ++$cnt;
        } else {
            $ans[] = 'No';
        }
    } elseif ($s[$i] === 'b') {
        if ($cnt < $a + $b && $cntb < $b) {
            $ans[] = 'Yes';
            ++$cnt;
            ++$cntb;
        } else {
            $ans[] = 'No';
        }
    } else {
        $ans[] = 'No';
    }
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
