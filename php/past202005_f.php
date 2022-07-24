<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    for ($j = 0; $j < $n; ++$j) {
        if (isset($cnt[$i][$s[$j]])) {
            ++$cnt[$i][$s[$j]];
        } else {
            $cnt[$i][$s[$j]] = 1;
        }
    }
}
$s = '';
for ($i = 0; $i < intdiv($n, 2) + $n % 2; ++$i) {
    foreach ($cnt[$i] as $c => $v) {
        if (isset($cnt[$n - 1 - $i][$c])) {
            $s .= $c;
            continue 2;
        }
    }
    exit('-1');
}
if ($n % 2) {
    $s .= strrev(substr($s, 0, -1));
} else {
    $s .= strrev($s);
}
echo $s;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
