<?php
list($n) = ints();
$w = strs();
$comb = ['b' => '1', 'c' => '1', 'd' => '2', 'w' => '2', 't' => '3', 'j' => '3', 'f' => '4', 'q' => '4', 'l' => '5', 'v' => '5', 's' => '6', 'x' => '6', 'p' => '7', 'm' => '7', 'h' => '8', 'k' => '8', 'n' => '9', 'g' => '9', 'z' => '0', 'r' => '0'];
for ($i = 0; $i < $n; ++$i) {
    $ans[$i] = '';
    $w[$i] = strtolower($w[$i]);
    for ($j = 0; $j < strlen($w[$i]); ++$j) {
        if (isset($comb[$w[$i][$j]])) $ans[$i] .= $comb[$w[$i][$j]];
    }
    if ($ans[$i] === '') unset($ans[$i]);
}
echo implode(' ', $ans);
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
