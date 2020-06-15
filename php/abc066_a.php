<?php
$a = ints();
echo array_sum($a) - max($a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
