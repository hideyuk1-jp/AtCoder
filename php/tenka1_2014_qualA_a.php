<?php

for ($i = 1; $i <= 1000; ++$i) {
    $s[] = (string) $i;
}
sort($s, SORT_STRING);
echo implode(PHP_EOL, $s) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
