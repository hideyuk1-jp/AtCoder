<?php
list($n) = ints();
$l = ints();
sort($l);
$cnt = 0;
for ($i = 0; $i < $n - 2; ++$i) {
    for ($j = $i + 1; $j < $n - 1; ++$j) {
        for ($k = $j + 1; $k < $n; ++$k) {
            if ($l[$i] === $l[$j] || $l[$j] === $l[$k] || $l[$i] === $l[$k]) continue;
            if ($l[$i] + $l[$j] <= $l[$k]) continue;
            ++$cnt;
        }
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
