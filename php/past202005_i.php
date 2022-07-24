<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    $is[$i] = $js[$i] = $i;
}
list($q) = ints();
$tenchi = 0;
$output = [];
for ($i = 0; $i < $q; ++$i) {
    list($type, $a, $b) = ints();
    if ($type !== 3) {
        --$a;
        --$b;
    }
    if (($type === 1 && $tenchi % 2 === 0) || ($type === 2 && $tenchi % 2)) {
        list($is[$a], $is[$b]) = [$is[$b], $is[$a]];
    } elseif (($type === 1 && $tenchi % 2) || ($type === 2 && $tenchi % 2 === 0)) {
        list($js[$a], $js[$b]) = [$js[$b], $js[$a]];
    } elseif ($type === 3) {
        ++$tenchi;
    } else {
        if ($tenchi % 2) {
            list($a, $b) = [$b, $a];
        }
        $output[] = $n * $is[$a] + $js[$b];
    }
}
echo implode(PHP_EOL, $output);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
