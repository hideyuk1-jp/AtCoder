<?php
list($h) = ints();
list($w) = ints();
list($n) = ints();
echo (intdiv($n, max($h, $w)) + min(1, $n % max($h, $w)));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
