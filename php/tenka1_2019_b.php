<?php

list($n) = ints();
list($s) = strs();
list($k) = ints();
--$k;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] !== $s[$k]) {
        $s[$i] = '*';
    }
}
echo $s;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
