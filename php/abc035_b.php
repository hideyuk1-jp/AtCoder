<?php
list($s) = strs();
$a = [0, 0];
$c = 0;
for ($i = 0; $i < strlen($s); ++$i) {
    if ($s[$i] === 'L') --$a[0];
    elseif ($s[$i] === 'R') ++$a[0];
    elseif ($s[$i] === 'U') ++$a[1];
    elseif ($s[$i] === 'D') --$a[1];
    else ++$c;
}
list($t) = ints();
$d = abs($a[0]) + abs($a[1]);
if ($t === 1) {
    echo ($d + $c) . PHP_EOL;
} else {
    if ($d >= $c) echo ($d - $c) . PHP_EOL;
    else echo (($c - $d) % 2) . PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
