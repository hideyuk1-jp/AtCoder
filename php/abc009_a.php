<?php
list($n) = ints();
echo $n % 2 ? intdiv($n, 2) + 1 : intdiv($n, 2);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
