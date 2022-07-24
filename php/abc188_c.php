<?php

[$n] = ints();
$a = ints();
$k = array_keys($a); // key記録
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < 2 ** $n; $j += 2 ** ($i + 1)) {
        // 後ろの人が勝ったら前の人と入れ替え
        if ($a[$j] < $a[$j + 2 ** $i]) {
            [$a[$j], $a[$j + 2 ** $i]] = [$a[$j + 2 ** $i], $a[$j]];
            [$k[$j], $k[$j + 2 ** $i]] = [$k[$j + 2 ** $i], $k[$j]];
        }
    }
}
echo $k[2 ** ($n - 1)] + 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
