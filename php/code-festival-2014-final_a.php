<?php
list($s) = ints();
echo (50 / $s) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
