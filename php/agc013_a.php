<?php

list($n) = ints();
$a = ints();
$c = 1;
for ($i = 0; $i < $n - 1; ++$i) {
    if ($a[$i] === $a[$i + 1]) {
        continue;
    }
    if (isset($p)) {
        if (($p === '<' && $a[$i] > $a[$i + 1]) || ($p === '>' && $a[$i] < $a[$i + 1])) {
            ++$c;
            unset($p);
        }
    } else {
        if ($a[$i] < $a[$i + 1]) {
            $p = '<';
        } elseif ($a[$i] > $a[$i + 1]) {
            $p = '>';
        }
    }
}
echo $c;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
