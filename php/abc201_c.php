<?php
[$S] = strs();
$ans = 0;
for ($i = 0; $i < 10000; ++$i) {
    $num = $i;
    $exists = array_fill(0, 10, false);
    for ($j = 0; $j < 4; ++$j) {
        $exists[$num % 10] = true;
        $num = intdiv($num, 10);
    }
    for ($j = 0; $j < 10; ++$j) {
        if ($S[$j] === 'o' && !$exists[$j]) continue 2;
        if ($S[$j] === 'x' && $exists[$j]) continue 2;
    }
    $ans++;
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
