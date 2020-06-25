<?php
list($n) = ints();
$s = strs();
$cnt = 0;
for ($i = 0; $i < $n; ++$i)
    if (array_search(str_replace('.', '', $s[$i]), ['takahashikun', 'TAKAHASHIKUN', 'Takahashikun']) !== false) ++$cnt;
echo $cnt . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
