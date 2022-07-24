<?php

list($n) = ints();
$a = ints();
arsort($a);
echo implode(PHP_EOL, array_map('plus1', array_keys($a)));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function plus1($n)
{
    return ++$n;
}
