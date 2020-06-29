<?php
list($n) = ints();
echo ($n + 1) * $n / 2;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
