<?php
list($n) = ints();
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    for ($j = 0; $j < $n; ++$j) {
        if ($s[$j] === 'R') ++$cnt;
        elseif ($s[$j] === 'B') --$cnt;
    }
}
if ($cnt > 0) echo 'TAKAHASHI';
elseif ($cnt < 0) echo 'AOKI';
else echo 'DRAW';
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
