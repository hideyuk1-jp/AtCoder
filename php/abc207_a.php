<?php
[$a, $b, $c] = ints();
echo $a + $b + $c - min($a, $b, $c);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
