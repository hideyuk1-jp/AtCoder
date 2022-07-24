<?php

list($n) = ints();
list($s) = strs();
list($t) = strs();
for ($i = $n; $i >= 1; --$i) {
    if (substr($s, $n - $i) === substr($t, 0, $i)) {
        break;
    }
}
echo $n * 2 - $i;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
