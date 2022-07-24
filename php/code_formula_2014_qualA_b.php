<?php

list($a, $b) = ints();
$s = array_fill(0, 10, 'x');
$p = ints();
for ($i = 0; $i < $a; ++$i) {
    $s[$p[$i]] = '.';
}
$q = ints();
for ($i = 0; $i < $b; ++$i) {
    $s[$q[$i]] = 'o';
}
echo implode(' ', [$s[7], $s[8], $s[9], $s[0]]) . PHP_EOL;
echo ' ' . implode(' ', [$s[4], $s[5], $s[6]]) . PHP_EOL;
echo '  ' . implode(' ', [$s[2], $s[3]]) . PHP_EOL;
echo '   ' . implode(' ', [$s[1]]) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
