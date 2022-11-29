<?php

[$s] = strs();
[$t] = strs();
echo strpos($s, $t) !== false ? 'Yes' : 'No';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
