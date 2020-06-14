<?php
list($c[]) = strs();
list($c[]) = strs();
echo $c[0][0] === $c[1][2] && $c[0][1] === $c[1][1] && $c[0][2] === $c[1][0] ? 'YES' : 'NO';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
