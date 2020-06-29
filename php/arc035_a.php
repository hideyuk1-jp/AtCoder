<?php
list($s) = strs();
echo f($s) ? 'YES' : 'NO';
echo PHP_EOL;
function f($s)
{
    $n = strlen($s);
    for ($i = 0; $i < intdiv($n, 2); $i++) {
        if ($s[$i] === '*' || $s[$n - $i - 1] === '*') continue;
        if ($s[$i] !== $s[$n - $i - 1]) return false;
    }
    return true;
}

function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
