<?php
list($n) = ints();
list($a) = strs();
list($b) = strs();
list($c) = strs();
$cnt = 0;
for ($i = 0; $i < $n; ++$i)
    $cnt += count(array_unique([$a[$i], $b[$i], $c[$i]])) - 1;
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
