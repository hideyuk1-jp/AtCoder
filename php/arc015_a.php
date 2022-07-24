<?php

list($n) = ints();
echo((9 * $n / 5) + 32) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
