<?php

list($n, $a, $b) = ints();
echo min($n, 5) * $b + max(0, $n - 5) * $a;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
