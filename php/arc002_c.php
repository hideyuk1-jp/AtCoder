<?php
list($n) = ints();
list($c) = strs();
$btns = ['A', 'B', 'X', 'Y'];
foreach ($btns as $b1) foreach ($btns as $b2) $combBtns[] = $b1 . $b2;
$min = PHP_INT_MAX;
foreach ($combBtns as $l) {
    foreach ($combBtns as $r) {
        if ($l === $r) continue;
        $cnt = 0;
        for ($i = 0; $i < $n - 1; ++$i) {
            if ($c[$i] . $c[$i + 1] === $l || $c[$i] . $c[$i + 1] === $r) {
                ++$cnt;
                ++$i;
            }
        }
        $min = min($min, $n - $cnt);
    }
}
echo $min . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
