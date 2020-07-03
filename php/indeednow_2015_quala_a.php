<?php
list($a) = ints();
list($b) = ints();
echo strlen((string) $a) * strlen((string) $b);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
