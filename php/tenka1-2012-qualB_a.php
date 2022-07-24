<?php

list($a, $b, $c) = ints();
$ans = [];
for ($i = 1; $i <= 127; ++$i) {
    if ($i % 3 === $a && $i % 5 === $b && $i % 7 === $c) {
        $ans[] = $i;
    }
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
