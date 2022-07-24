<?php

list($s) = strs();
echo str_replace('2014', '2015', $s) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
