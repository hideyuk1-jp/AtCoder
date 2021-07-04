<?php
[$s] = strs();
echo $s[0] === $s[1] && $s[1] === $s[2] ? 'Won' : 'Lost';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
