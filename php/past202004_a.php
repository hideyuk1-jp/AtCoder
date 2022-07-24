<?php

list($s, $t) = strs();
echo abs(f($s) - f($t));
function f($s)
{
    return  is_numeric($s[0]) ? (int)$s[0] : - ((int)$s[1] - 1);
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
