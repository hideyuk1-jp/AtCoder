<?php

[$n] = ints();
$a = ints();
$b = ints();
$c = ints();
$suma = array_fill(1, $n, 0);
$sumb = array_fill(1, $n, 0);
for ($i = 0; $i < $n; $i++) {
    $suma[$a[$i]]++;
    $sumb[$b[$c[$i] - 1]]++;
}
$cnt = 0;
for ($i = 1; $i <= $n; $i++) {
    $cnt += $suma[$i] * $sumb[$i];
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
