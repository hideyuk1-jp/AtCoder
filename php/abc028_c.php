<?php

list($a, $b, $c, $d, $e) = ints();
echo $b - $a > $d - $c ? $b + $c + $e : $a + $d + $e;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
