<?php

list($n, $m, $q) = ints();
$scores = array_fill(0, $m, $n);
for ($i = 0; $i < $q; ++$i) {
    list($type, $a, $b) = strs();
    --$a;
    if ($type === '1') {
        $s = 0;
        foreach ($solves[$a] as $solve) {
            $s += $scores[$solve];
        }
        $ans[] = $s;
    }
    if ($type === '2') {
        --$b;
        --$scores[$b];
        $solves[$a][] = $b;
    }
}
echo implode(PHP_EOL, $ans);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
