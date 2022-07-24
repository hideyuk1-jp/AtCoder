<?php

list($s) = strs();
echo strtoupper($s[0]) . strtolower(substr($s, 1)) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
