<?php

$a = ints();
$b = ints();
echo dfs() . PHP_EOL;
function dfs($i = 0, $usedb = [])
{
    global $a, $b;
    if ($i === 3) {
        return 1;
    }
    foreach ($b as $j => $v) {
        if (array_search($j, $usedb) === false) {
            $res[] = intdiv($a[$i], $b[$j]) * dfs($i + 1, array_merge($usedb, [$j]));
        }
    }
    return max($res);
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
