<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($s[]) = strs();
for ($i = 0; $i < $n; ++$i) {
    $a[$i] = '';
    for ($j = 0; $j < $n; ++$j) $a[$i] .= $s[$n - 1 - $j][$i];
}
echo implode(PHP_EOL, $a);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
