<?php

list($n, $m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($a, $b) = ints();
    if (isset($cnt[$a])) {
        ++$cnt[$a];
    } else {
        $cnt[$a] = 1;
    }
    if (isset($cnt[$b])) {
        ++$cnt[$b];
    } else {
        $cnt[$b] = 1;
    }
}
foreach ($cnt as $v) {
    if ($v % 2) {
        exit('NO');
    }
}
echo 'YES';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
