<?php

list($n) = ints();
echo 800 * $n - 200 * intdiv($n, 15);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
