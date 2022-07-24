<?php

list($n) = ints();
echo strpos((string) $n, '3') !== false || $n % 3 === 0 ? 'YES' : 'NO';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
