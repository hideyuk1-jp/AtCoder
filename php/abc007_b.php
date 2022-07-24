<?php

list($a) = strs();
if ($a === 'a') {
    exit('-1' . PHP_EOL);
}
if (strlen($a) === 1) {
    exit('a' . PHP_EOL);
}
echo substr($a, 0, strlen($a) - 1) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
