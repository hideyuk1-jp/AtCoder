<?php

list($a, $d) = ints();
echo $d > $a ? ($a + 1) * $d : $a * ($d + 1);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
