<?php

list($s) = strs();
echo str_replace('HAGIYA', 'HAGIXILE', $s) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
