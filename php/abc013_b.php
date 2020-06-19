<?php
list($a) = ints();
list($b) = ints();
echo min(abs($a - $b), abs(($a + 10) - $b), abs($a - ($b + 10))) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
