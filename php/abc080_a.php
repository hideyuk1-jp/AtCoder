<?php
list($n, $a, $b) = ints();
echo min($a * $n, $b);

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
