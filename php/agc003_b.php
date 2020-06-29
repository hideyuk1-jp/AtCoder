<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($a[]) = ints();
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] % 2 && ($a[$i + 1] ?? 0) !== 0) ++$a[$i + 1];
    $cnt += intdiv($a[$i], 2);
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
