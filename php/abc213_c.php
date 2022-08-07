<?php

[$h, $w, $n] = ints();
for ($i = 0; $i < $n; ++$i) {
    [$a, $b] = ints();
    --$a;
    --$b;
    $orig[] = [$a, $b];
    $rows[$a] = 1;
    $cols[$b] = 1;
}
$rows = array_keys($rows);
$cols = array_keys($cols);
sort($rows);
sort($cols);
$convRow = array_flip($rows);
$convCol = array_flip($cols);
for ($i = 0; $i < $n; ++$i) {
    $ans[] = ($convRow[$orig[$i][0]] + 1) . ' ' . ($convCol[$orig[$i][1]] + 1);
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
