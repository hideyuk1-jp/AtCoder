<?php

list($s) = strs();
list($a, $b, $c, $d) = ints();
$ans = $a === 0 ? '"' : '';
for ($i = 0; $i < strlen($s); ++$i) {
    $ans .= $s[$i];
    if ($i + 1 === $a || $i + 1 === $b || $i + 1 === $c || $i + 1 === $d) {
        $ans .= '"';
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
