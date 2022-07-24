<?php

$a = ints();
sort($a);
echo $a[1] . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
