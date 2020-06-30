<?php
list($n) = ints();
$a = ints();
sort($a);
$ok = 0;
$sum = 0;
for ($i = 0; $i < $n - 1; ++$i) {
    $sum += $a[$i];
    if ($sum * 2 < $a[$i + 1]) $ok = $i + 1;
}
echo $n - $ok;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
