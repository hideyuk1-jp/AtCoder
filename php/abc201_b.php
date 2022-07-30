<?php

[$n] = ints();
for ($i = 0; $i < $n; ++$i) {
    [$s[], $_t] = strs();
    $_t = intval($_t);
    $t[] = $_t;
}
array_multisort($t, SORT_DESC, $s);
echo $s[1];
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
