<?php
[$n] = ints();
$cnt = 0;
for ($i = 1; $i <= $n; ++$i) {
    for ($j = 1; $j <= $n; ++$j) {
        $ij = $i * $j;
        if ($i * $j > $n) break;
        for ($k = 1; $k <= $n; ++$k) {
            if ($ij * $k > $n) break;
            $cnt++;
        }
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
