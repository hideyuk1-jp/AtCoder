<?php
list($c) = strs();
echo array_search($c, ['O', 'P', 'K', 'L']) === false ? 'Left' : 'Right';
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
