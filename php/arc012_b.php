<?php

list($n, $va, $vb, $l) = ints();
for ($i = 0; $i < $n; ++$i) {
    $t = $l / $va;
    $l = $vb * $t;
}
$l = (int) ($l * 10 ** 9);
$l = $l / 10 ** 9;
echo $l . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
