<?php

list($s) = strs();
echo str_repeat($s, 2) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
