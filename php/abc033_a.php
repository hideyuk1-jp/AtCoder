<?php

list($s) = strs();
echo str_repeat($s[0], 4) === $s ? 'SAME' : 'DIFFERENT';
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
