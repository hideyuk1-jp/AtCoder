<?php

list($n, $x) = ints();
echo min($x - 1, $n - $x);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
