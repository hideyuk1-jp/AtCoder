<?php
list($n, $x) = ints();
$a = ints();
$cnt = 0;
for ($i = 1; $i < $n; ++$i) {
    if ($a[$i] + $a[$i - 1] > $x) {
        $d = $a[$i] + $a[$i - 1] - $x;
        $a[$i] = max(0, $a[$i] - $d);
        $cnt += $d;
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
