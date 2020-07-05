<?php
list($n) = ints();
foreach (['AC', 'WA', 'TLE', 'RE'] as $v) $cnt[$v] = 0;
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    ++$cnt[$s];
}
foreach (['AC', 'WA', 'TLE', 'RE'] as $v) {
    echo $v . ' x ' . $cnt[$v] . PHP_EOL;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
