<?php
list($n) = ints();
echo $n . PHP_EOL;
echo implode(PHP_EOL, array_fill(0, $n, 1)) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
