<?php
list($x, $y) = ints();
echo max($x, $y) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
