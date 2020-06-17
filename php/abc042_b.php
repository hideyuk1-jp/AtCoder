<?php
list($n, $l) = ints();
for ($i = 0; $i < $n; ++$i) list($s[]) = strs();
natsort($s);
echo implode('', $s);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
