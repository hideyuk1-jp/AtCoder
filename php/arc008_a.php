<?php
list($n) = ints();
echo intdiv($n, 10) * 100 + min(($n % 10) * 15, 100);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
