<?php
$b = ints();
$bb = array_flip($b);
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[$i]) = strs();
    $c[$i] = '';
    for ($j = 0; $j < strlen($a[$i]); ++$j) $c[$i] .= $bb[$a[$i][$j]];
}
array_multisort($c, SORT_ASC, $a);
echo implode(PHP_EOL, $a);
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
