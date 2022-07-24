<?php

list($n) = ints();
echo '1' . str_repeat('0', $n - 1) . '7' . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
