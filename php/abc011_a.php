<?php
list($n) = ints();
echo $n + 1 > 12 ? $n - 11 : $n + 1;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
