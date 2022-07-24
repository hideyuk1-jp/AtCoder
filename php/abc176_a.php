<?php

list($n, $x, $t) = ints();
echo(intdiv($n, $x) + min(1, $n % $x)) * $t;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
