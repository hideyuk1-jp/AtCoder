<?php
list($r, $c, $d) = ints();
$max = 0;
for ($i = 0; $i < $r; ++$i) {
    $a = ints();
    for ($j = 0; $j < $c; ++$j)
        if ($i + $j <= $d && ($d - ($i + $j)) % 2 === 0) $max = max($max, $a[$j]);
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
