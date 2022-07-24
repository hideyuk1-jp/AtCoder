<?php

list($x) = strs();
list($s) = strs();
echo str_replace($x, '', $s) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
