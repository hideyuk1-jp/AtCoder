<?php

$ans = 0;
for ($i = 0; $i < 3; ++$i) {
    list($s, $e) = ints();
    $ans += $s * $e / 10;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
