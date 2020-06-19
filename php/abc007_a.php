<?php
list($n) = ints();
echo ($n - 1) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
