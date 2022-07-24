<?php

[$N] = ints();
$cnt = 0;
$flag = false;
for ($i = 0; $i < $N; ++$i) {
    [$d1, $d2] = ints();
    if ($d1 === $d2) {
        ++$cnt;
    } else {
        $cnt = 0;
    }
    if ($cnt === 3) {
        $flag = true;
    }
}
echo $flag ? 'Yes' . PHP_EOL : 'No' . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
