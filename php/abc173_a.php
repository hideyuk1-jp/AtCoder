<?php
list($n) = ints();
echo 1000 * (intdiv($n, 1000) + min(1, $n % 1000)) - $n;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
