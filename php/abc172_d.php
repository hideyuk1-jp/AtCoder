<?php
list($n) = ints();
$ans = 0;
for ($i = 1; $i <= $n; $i++)
    $ans += $i * (intdiv($n, $i) + 1) * intdiv($n, $i) / 2;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
