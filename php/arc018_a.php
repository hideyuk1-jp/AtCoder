<?php
list($h, $b) = strs();
echo (($h / 100) ** 2 * $b) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
